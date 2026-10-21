<?php

namespace MediaWiki\Extension\TimelessDarkMode;

use MediaWiki\MediaWikiServices;

/**
 * Adds a Timeless-only light/dark/automatic preference.
 *
 * MediaWiki 1.43 hook signatures are intentionally used without strict
 * parameter type declarations for compatibility with nearby branches.
 */
class Hooks {

    private const OPTION = 'timelessdarkmode-mode';

    /** @var string[] */
    private const VALID_MODES = [ 'light', 'dark', 'auto' ];

    /**
     * Add Special:Preferences -> Appearance -> Skin preference.
     *
     * @param \User $user
     * @param array &$preferences
     */
    public function onGetPreferences( $user, &$preferences ): void {
        $current = $this->getMode( $user );
        $preferences[self::OPTION] = [
            'type' => 'select',
            'label-message' => 'timelessdarkmode-pref-label',
            'help-message' => 'timelessdarkmode-pref-help',
            'section' => 'rendering/skin',
            'options' => [
                wfMessage( 'timelessdarkmode-light' )->text() => 'light',
                wfMessage( 'timelessdarkmode-dark' )->text() => 'dark',
                wfMessage( 'timelessdarkmode-auto' )->text() => 'auto'
            ],
            'default' => $current
        ];
    }

    /**
     * Only load the style ResourceLoader module for Timeless.
     *
     * @param \MediaWiki\Output\OutputPage $out
     * @param \Skin $skin
     */
    public function onBeforePageDisplay( $out, $skin ): void {
        if ( $skin->getSkinName() !== 'timeless' ) {
            return;
        }
        $out->addModuleStyles( [ 'ext.timelessDarkMode.styles' ] );

        // A custom dark logo is optional; otherwise, CSS whitens the
        // existing monochrome logo. Keep the URL on the page rather than
        // injecting site-specific values into the shared RL stylesheet.
        $logoUrl = $this->getDarkLogoUrl( $out );
        if ( $logoUrl !== null ) {
            // Validated URL contains no quotes, whitespace, or CSS control
            // syntax. Use CSS custom property so dark/auto can share rules.
            $out->addInlineStyle(
                'body.skin-timeless { --timelessdarkmode-logo-image: url("' .
                $logoUrl . '"); }'
            );
        }
    }

    /**
     * Mark the body server-side to avoid JS-dependent dark mode and
     * user-dependent ResourceLoader CSS caching.
     *
     * @param \MediaWiki\Output\OutputPage $out
     * @param \Skin $skin
     * @param array &$bodyAttrs
     */
    public function onOutputPageBodyAttributes( $out, $skin, &$bodyAttrs ): void {
        if ( $skin->getSkinName() !== 'timeless' ) {
            return;
        }
        $mode = $this->getMode( $skin->getUser() );
        $classes = ' timelessdarkmode-' . $mode;
        if ( $this->getDarkLogoUrl( $out ) !== null ) {
            $classes .= ' timelessdarkmode-logo-custom';
        }
        $bodyAttrs['class'] = trim( ( $bodyAttrs['class'] ?? '' ) . $classes );
    }

    /**
     * Return a CSS-safe site-configured logo URL or null. Use site-root paths
     * (preferable) or HTTPS URLs. Restrict the alphabet to URL characters;
     * notably disallow quotes, parentheses, backslashes and whitespace so
     * the value cannot terminate the CSS url() used in addInlineStyle().
     */
    private function getDarkLogoUrl( $out ): ?string {
        $value = $out->getConfig()->get( 'TimelessDarkModeLogo' );
        if ( !is_string( $value ) || $value === '' ) {
            return null;
        }
        if ( !preg_match( '#^(?:/(?!/)|https://)[A-Za-z0-9/%._~+\-:?&=\#]*$#D', $value ) ) {
            return null;
        }
        return $value;
    }

    /**
     * @param \User $user
     */
    private function getMode( $user ): string {
        $lookup = MediaWikiServices::getInstance()->getUserOptionsLookup();
        $value = $lookup->getOption( $user, self::OPTION, 'light' );
        return is_string( $value ) && in_array( $value, self::VALID_MODES, true )
            ? $value
            : 'light';
    }
}
