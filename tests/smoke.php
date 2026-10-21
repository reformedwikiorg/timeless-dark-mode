<?php
/**
 * Small dependency-free smoke test of the preference/hooks logic.
 * Run: php tests/smoke.php
 * This is not a substitute for testing inside MediaWiki 1.43.
 */
namespace MediaWiki {
    final class MediaWikiServices {
        public static $instance;
        public static function getInstance() {
            return self::$instance;
        }
        public function getUserOptionsLookup() {
            return $this->lookup;
        }
        public $lookup;
    }
}

namespace {
    class DummyLookup {
        public function getOption( $user, $name, $fallback = 'light' ) {
            return $user->mode ?? $fallback;
        }
    }
    class DummySkin {
        public function __construct( public $name, public $user ) {}
        public function getSkinName() { return $this->name; }
        public function getUser() { return $this->user; }
    }
    class DummyConfig {
        public function __construct( public $logoUrl = null ) {}
        public function get( $key ) {
            if ( $key !== 'TimelessDarkModeLogo' ) {
                throw new \RuntimeException( "Unexpected config $key" );
            }
            return $this->logoUrl;
        }
    }
    class DummyOutput {
        public $modules = [];
        public $inlineStyle = [];
        public function __construct( public $logoUrl = null ) {}
        public function addModuleStyles( $modules ) { $this->modules = $modules; }
        public function addInlineStyle( $css ) { $this->inlineStyle[] = $css; }
        public function getConfig() { return new DummyConfig( $this->logoUrl ); }
    }
    class DummyMessage {
        public function __construct( public $name ) {}
        public function text() { return $this->name; }
    }
    function wfMessage( $name ) { return new DummyMessage( $name ); }
    function verify( $actual, $expected, $description ) {
        if ( $actual !== $expected ) {
            throw new \RuntimeException(
                "$description failed: expected " . var_export( $expected, true ) .
                ' got ' . var_export( $actual, true )
            );
        }
        echo "PASS: $description\n";
    }

    require dirname( __DIR__ ) . '/includes/Hooks.php';
    $services = new \MediaWiki\MediaWikiServices();
    $services->lookup = new DummyLookup();
    \MediaWiki\MediaWikiServices::$instance = $services;
    $hooks = new \MediaWiki\Extension\TimelessDarkMode\Hooks();

    foreach ( [ 'light', 'dark', 'auto', 'invalid' ] as $mode ) {
        $user = (object)[ 'mode' => $mode ];
        $skin = new DummySkin( 'timeless', $user );
        $out = new DummyOutput();
        $attrs = [ 'class' => 'skin-timeless' ];
        $hooks->onOutputPageBodyAttributes( $out, $skin, $attrs );
        $effective = $mode === 'invalid' ? 'light' : $mode;
        verify( $attrs['class'], 'skin-timeless timelessdarkmode-' . $effective,
            "body class for '$mode'" );
        $prefs = [];
        $hooks->onGetPreferences( $user, $prefs );
        verify( $prefs['timelessdarkmode-mode']['default'], $effective,
            "preference value for '$mode'" );
        $hooks->onBeforePageDisplay( $out, $skin );
        verify( $out->modules, [ 'ext.timelessDarkMode.styles' ],
            "style module loaded for '$mode'" );
    }
    $other = new DummySkin( 'vector-2022', (object)[ 'mode' => 'dark' ] );
    $attrs = [ 'class' => 'skin-vector-2022' ];
    $out = new DummyOutput();
    $hooks->onBeforePageDisplay( $out, $other );
    $hooks->onOutputPageBodyAttributes( $out, $other, $attrs );
    verify( $out->modules, [], 'other skin does not load stylesheet' );
    verify( $attrs['class'], 'skin-vector-2022', 'other skin remains unchanged' );
    // Alternate site logo is opt-in, does not affect normal Timeless, and
    // URLs containing CSS syntax are rejected instead of being interpolated.
    $skin = new DummySkin( 'timeless', (object)[ 'mode' => 'dark' ] );
    $logo = '/images/5/53/ReformedWiki-dark.svg';
    $out = new DummyOutput( $logo );
    $attrs = [ 'class' => 'skin-timeless' ];
    $hooks->onOutputPageBodyAttributes( $out, $skin, $attrs );
    verify( $attrs['class'], 'skin-timeless timelessdarkmode-dark timelessdarkmode-logo-custom',
        'custom-logo body class' );
    $hooks->onBeforePageDisplay( $out, $skin );
    verify( count( $out->inlineStyle ), 1, 'custom-logo inline CSS added' );
    verify( str_contains( $out->inlineStyle[0], $logo ), true, 'custom-logo URI present' );

    $out = new DummyOutput( 'https://example.org/logo%20dark.svg' );
    $attrs = [ 'class' => 'skin-timeless' ];
    $hooks->onOutputPageBodyAttributes( $out, $skin, $attrs );
    verify( str_contains( $attrs['class'], 'logo-custom' ), true, 'HTTPS logo is allowed' );

    foreach ( [ '//evil.example/logo.svg', '/bad/logo.png");body{display:none}',
        'javascript:alert(1)', 'ftp://example.com/logo.svg' ] as $invalidUrl ) {
        $out = new DummyOutput( $invalidUrl );
        $attrs = [ 'class' => 'skin-timeless' ];
        $hooks->onOutputPageBodyAttributes( $out, $skin, $attrs );
        verify( str_contains( $attrs['class'], 'logo-custom' ), false,
            'reject unsupported or unsafe logo URL' );
        $hooks->onBeforePageDisplay( $out, $skin );
        verify( $out->inlineStyle, [], 'no CSS injection on rejected URL' );
    }
    echo "All smoke tests passed.\n";
}
