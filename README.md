## Version 1.0.10 — Page history selected revision readability

This release improves the selected revision rows on page history screens. In
MediaWiki's default styling, the chosen revision entries use a light background,
which becomes difficult to read in Timeless dark mode. Version 1.0.10 gives the
selected page-history rows a dark highlight, readable text, blue links and a
muted dashed outline while preserving the revision comparison controls.

Install by replacing your existing `extensions/TimelessDarkMode/` directory with
`TimelessDarkMode-1.0.10.zip`, then reload the page (you may need to purge
ResourceLoader caches). The update includes all fixes from 1.0.9.

## Version 1.0.9 — DiscussionTools reply preview readability

This release fixes the DiscussionTools reply preview area on talk pages. The
reply editor itself already used the dark palette, but the rendered preview box
still used a light background, making previewed text and links difficult to
read. Version 1.0.9 gives the reply preview a dark surface, readable light text,
blue links, and matching borders while preserving the rest of the reply widget.

Install by replacing your existing `extensions/TimelessDarkMode/` directory with
`TimelessDarkMode-1.0.9.zip`, then reload the page (you may need to purge
ResourceLoader caches). The update includes all fixes from 1.0.8.

## Version 1.0.8 — MediaWiki notification banner readability

This release adds dark-mode styling for MediaWiki's core floating notification
banners such as page created, page deleted, success notices, warnings and other
post-action messages. These banners are separate from Echo and previously kept
their light background, making text difficult to read in Timeless dark mode.
Version 1.0.8 gives them dark backgrounds, readable light text, blue links and
appropriate warning/error colors while preserving their layout and behavior.

Install by replacing your existing `extensions/TimelessDarkMode/` directory with
`TimelessDarkMode-1.0.8.zip`, then reload the page (you may need to purge
ResourceLoader caches). The update includes all fixes from 1.0.7.

# TimelessDarkMode (1.0.10)

A lightweight **MediaWiki 1.43 / Timeless** dark-theme extension. It adds a
**Timeless color theme** dropdown under **Special:Preferences → Appearance**:

- **Light** — unmodified Timeless colors
- **Dark** — dark palette from `resources/dark.less`
- **Automatic** — follow the visitor's system light/dark preference

It does **not** fork or alter `/skins/Timeless`, invert photographs, or require
JavaScript. The normal Timeless skin remains selectable as before.

## Version 1.0.7 — Echo notification-preferences checkbox matrix

Fixes alternating bright-white/light-gray rows in **Special:Preferences →
Notifications** (`#mw-prefsection-echo`). MediaWiki 1.43 uses
`table.mw-htmlform-matrix.mw-widget-checkMatrixWidget-matrix` for the Web/Email
checkbox grid, and its legacy OOUI row styles give even-numbered table cells a
light background independent of the Preferences panel.

This release darkens the matrix and all its data cells, keeps subtle
alternating-row contrast and hover feedback, and makes the row labels readable.
Checkboxes are still controlled by OOUI: blue selected states, disabled
states, keyboard access and form saving are unchanged. The new styles apply
only when Timeless Dark (or Automatic with a dark system preference) is active.

Upgrade by replacing `extensions/TimelessDarkMode/` with the directory from
`TimelessDarkMode-1.0.7.zip`; no extra stylesheet or `LocalSettings.php`
changes are needed. All fixes from 1.0.0–1.0.6 are included.

## Version 1.0.6 — Echo empty-notifications placeholder

Fixes the light blue/gray **"There are no notifications"** box in the
Alerts and Notices dropdowns (and the same Echo placeholder if displayed
on the full Notifications page). MediaWiki Echo 1.43 uses a separate
`.mw-echo-ui-placeholderItemWidget` background, not the normal notification
item styling. It now uses the dark theme's raised surface (`#30363f`),
light text (`#e6eaf0`), and blue links (`#91c5ff`). The widget's spacing,
size and logic are unchanged; Light mode is untouched.

Upgrade by replacing `extensions/TimelessDarkMode/` with the folder from
`TimelessDarkMode-1.0.6.zip`. No new configuration or database changes.
Includes all changes from 1.0.0 through 1.0.5.

## Version 1.0.5 — Full Echo inbox dark-mode contrast

The full **Special:Notifications** inbox uses separate Echo 1.43 components
from the Alerts/Notices dropdowns. This update darkens its sticky toolbar,
notification cards and no-JS fallback; keeps read messages distinct from
unread messages with a muted dark-blue background; and improves notification
text, action links, timestamps and sidebar counter colors. The brief
"unseen" fade also uses dark palette colors to prevent a pale-blue flash.

Upgrade by replacing `extensions/TimelessDarkMode/` with the folder from
`TimelessDarkMode-1.0.5.zip`. No database or `LocalSettings.php` changes.
Includes every fix through 1.0.4. Test Special:Notifications in Dark and
Light modes, with read/unread messages, and at a mobile viewport.

## Version 1.0.4 — MediaWiki data-table contrast (Special:Tags)

Fixes the bright white data cells and nearly invisible light text seen in
`Special:Tags` (the sortable `.mw-datatable.mw-tags-table` table). MediaWiki's
legacy table CSS explicitly sets data-cell backgrounds to white, so previous
overrides on just the table itself were insufficient. This release applies
near-black/dark-gray cell fills, alternate-row contrast, a darker hover state,
and readable text and borders to `.mw-datatable` cells in Dark/Automatic mode.
It preserves table sorting, hyperlinks, and Light mode behavior. Other
MediaWiki special pages using the same `.mw-datatable` class also benefit.

Upgrade by replacing `extensions/TimelessDarkMode/` with the folder from
`TimelessDarkMode-1.0.4.zip`. No configuration or database changes are needed.
All changes from 1.0.0 through 1.0.3 are included. Validate on `Special:Tags`
in Dark, Light, and Automatic modes, including a sortable-column click and
hover state, then hard-refresh if old ResourceLoader CSS persists.

## Version 1.0.3 — DiscussionTools comment highlight contrast

Fixes pale-blue, low-contrast highlighting when opening a talk-page comment
from an AtMention/notification link, including mobile views. DiscussionTools
renders a temporarily visible `.ext-discussiontools-init-highlight` overlay,
which ordinarily blends using `mix-blend-mode: darken` on light pages. While
Timeless dark mode is active, this release uses `lighten` blending with a muted
dark-blue target-comment color (and dark-green published-comment color). It
keeps original highlighting, fading and click/scroll behavior intact.

Upgrade by replacing the installed `extensions/TimelessDarkMode/` directory
with the folder from `TimelessDarkMode-1.0.3.zip`. No changes to
`LocalSettings.php` are needed. It includes all prior 1.0.2 fixes. After
upgrading, open an AtMention/notification link to a discussion and confirm
that text remains readable while the highlight is visible. Also check Dark,
Light, and Automatic mode and a mobile-sized screen.

## Version 1.0.2 — Echo dropdown readability

This release improves the **Alerts** and **Notices** dropdown panels in dark mode.
The Echo extension styles its own popup surfaces and notification rows, so those
areas remained light and difficult to read even after the general OOUI popup
fixes. Version 1.0.2 gives the notification popup a dark background, readable
light text, blue links, muted secondary text, and darker footer/header controls
while preserving badge counters and the existing Echo layout.

Install by replacing your existing `extensions/TimelessDarkMode/` directory with
`TimelessDarkMode-1.0.2.zip`, then reload the page (you may need to purge
ResourceLoader caches). The update includes all fixes from 1.0.1.

## Version 1.0.1 — mobile account icon alignment fix

This maintenance release corrects the user/account icon on narrow mobile
screens (850px and below). Version 1.0.0 applied desktop icon positioning to
`#personal h2`, which overrode Timeless's absolute positioning for the mobile
menu and could drop the user icon behind the search field. Version 1.0.1
restores Timeless's original mobile positioning and centers the light icon
inside the existing 30px mobile menu heading. No site configuration changes
are needed, and normal/light mode is unaffected.

Replace `extensions/TimelessDarkMode/` with the folder from
`TimelessDarkMode-1.0.1.zip`, then reload the page (you may need to purge
ResourceLoader caches). The update includes all fixes from 1.0.0.

**Verification:** On a phone with Timeless selected, check the hamburger,
logo, notification, account and search controls in Dark, Light and Automatic
modes. The change was tested in a local responsive CSS regression harness,
but still requires confirmation against your live site's HTML and styles.

## Version 1.0.0 — first stable release

This is the first non-beta release of TimelessDarkMode. It contains the
**same functional code and styling as 1.0.0-beta.14**, including every
previous beta fix. Only the release metadata and documentation have changed.

To upgrade, replace the installed `extensions/TimelessDarkMode/` directory
with the directory from `TimelessDarkMode-1.0.0.zip`, keeping your existing
`LocalSettings.php` configuration. There is no database migration, extra
stylesheet, or separate patch to install. Check `Special:Version` for **1.0.0**.

MediaWiki 1.43 / Timeless is the primary compatibility target; keep testing
third-party extensions and custom wiki components on your installation.

---

### Prior beta release notes (included in 1.0.0)

## Update to beta.14 (cumulative release): light/dark logo support

Version 14 retains **all prior fixes** and improves the site logo in dark mode.
Timeless 1.43 puts an `<img>` inside `a.mw-wiki-logo.timeless-logo`.

**Default: white monochrome logo.** With no new configuration, dark mode now
applies `brightness(0) invert(1)` to just the Timeless logo image. This turns
ReformedWiki's black transparent logo white (including Automatic mode when the
system prefers dark). The normal Timeless logo is unchanged in Light mode.
For **colored or photographic logos**, use a separate dark asset below rather
than applying the white monochrome filter.

**Optional: separate dark logo file.** Upload or place a transparent SVG/PNG
image accessible at a URL such as `/images/5/53/ReformedWiki-dark.svg`.
Add **after** `wfLoadExtension( 'TimelessDarkMode' );` in `LocalSettings.php`:

```php
$wgTimelessDarkModeLogo = '/images/5/53/ReformedWiki-dark.svg';
```

Use the actual **Original file** URL from the file page, not the page URL
(`.../wiki/File:...`) and not a thumbnail URL. The option accepts site-root
(`/...`) or `https://` paths without unencoded spaces or parentheses; if the
path contains these, percent-encode them. Leave it unset or set it to `null`
for the white-filter fallback.

The extension will overlay the configured dark artwork on the Timeless logo
link **only** in Dark mode or Automatic + system-dark mode; it reserves the
original image's dimensions, preserves the logo's link and Light mode, and
requires no JavaScript. The dark asset should have the same proportions as
its light equivalent for consistent alignment. The setting doesn't affect
other skins, the site wordmark, or content images.

**Deployment:** Replace the entire `extensions/TimelessDarkMode` directory.
As before, no additional LESS file is needed. Edit `LocalSettings.php` only
if you want a custom dark image. Clear browser/ResourceLoader cache after
updating. An extension-only filter is included automatically.

**Verification:** Compare logo position and color in Light, Dark, and Automatic
modes on desktop and mobile, with an uploaded custom URL (if configured).
PHP smoke tests and static stylesheet checks do not substitute for testing
inside a live MediaWiki installation.

## Update to beta.13 (cumulative release)

This archive includes **every change from Beta 1–12** and fixes two dark-mode
header problems observed on ReformedWiki's Special:Preferences screenshot.

- **Echo alert and notice icons:** The bell and tray graphics are SVG
  `background-image`s on the `.mw-echo-notifications-badge` element itself.
  The older rule filtered an empty `::before` pseudo-element, leaving the
  original dark icon nearly invisible. The new code paints the original SVG
  on a separate white-filtered `::before` layer while preserving the Echo
  `::after` unread-notification counter (including its colors and positioning).
- **Personal user icon alignment:** Remove the broad `#user-tools h2::before`
  rule that had overridden the specific `#personal h2::before` icon position.
  Timeless's usual heading and text geometry are unchanged.

Replace the whole `extensions/TimelessDarkMode/` folder. No standalone LESS
file, database update, or `LocalSettings.php` changes are required. Test
alerts/notices with both zero and nonzero counts, and compare the top-right
user silhouette in **Dark**, **Light**, and **Automatic** modes. Cache-bust
with a hard reload after installing. This fix has not yet been visually
verified in a running MediaWiki instance.

## Update to beta.12 (cumulative release)

This package includes **all Beta 1–11 changes** and fixes white-on-white
selected checkboxes when Timeless dark mode is active. All changes are scoped
by the existing Timeless Dark / Automatic classes; Light mode and other skins
are unchanged.

- **Native HTML** (`input[type="checkbox"]`): blue selection (`#36c`) via
  `accent-color`, retaining the browser's checkmark and keyboard support.
- **OOUI checkboxes:** Stop the global white-icon filter from whitening the
  *entire* check icon box. Give selected and indeterminate boxes a blue fill,
  a darker blue hover, and visible keyboard focus.
- **Codex checkboxes:** Blue selected background with a white CSS-drawn tick;
  unchecked and disabled states remain under MediaWiki's normal styling.
- **Legacy MediaWiki UI:** Blue checked box background for label-generated
  controls.

Replace your entire `extensions/TimelessDarkMode/` folder with the one in
this ZIP; **do not** install a separate `.less` file. No database migration or
`LocalSettings.php` change is required. Hard refresh the browser afterward.

**Verification:** Visit Special:Preferences and an edit form. Inspect checked,
unchecked, focused, disabled, and indeterminate checkboxes where available.
Also test Light and Automatic modes. This is not a substitute for live
cross-browser testing on your wiki.

## Update to beta.11 (cumulative release)

This archive retains **all Beta 1–10 fixes**, and adds dark-mode styling for
**Logos Reftagger** Bible-reference hover cards (`.rtTooltip`). The popup
container is near-black (`#111214`), reference header a slightly lighter
`#252a31`, verse text light (`#e6eaf0`), internal links blue (`#91c5ff`),
and borders muted (`#48525e`). Scripture, Logos links and any brand/social
artwork retain their original content and functionality.

The selectors are confined to Timeless **Dark**, or **Automatic** when the
browser/device prefers dark. Reftagger's own `.rtLight` and `.rtDark` CSS
rules may be loaded later, so the extension uses narrowly scoped `!important`
color declarations; popup dimensions/placement and interactions are not
changed. No Reftagger or `LocalSettings.php` configuration changes are needed.

**Install:** Unpack the ZIP and replace the complete
`extensions/TimelessDarkMode/` folder; no separate LESS file is required.

**Test:** Hover a Bible reference (e.g. John 3:16) in Dark mode, in Light
mode, and in Automatic with system dark/light preferences. Confirm verse
text and Logos links are readable. Reftagger comes from a third-party script;
this update has not been visually verified in your production installation.

## Update to beta.10 (cumulative release)

This ZIP includes **all fixes from Beta 1–9**. Replace your existing
`extensions/TimelessDarkMode/` folder; leave `LocalSettings.php` unchanged.

**New in beta.10:** Dark styling for link-hover Page Previews from the MediaWiki
Popups extension (`.mwe-popups` / `.mwe-popups-container`). It now renders a
near-black preview card (`#111214`), light readable article extract,
blue inner links, dark truncation gradient (LTR and RTL), and matching pointer.
The cog/settings icon is recolored without inverting photographs or thumbnails.

The CSS applies only when Timeless is in **Dark**, or in **Automatic** when
the operating system requests dark. The Popups extension remains optional.

**Testing:** Hover over an article link with Page Previews enabled; check a
popup with and without a thumbnail, and a popup positioned above its link.
The ZIP is syntax/smoke-tested but not visually verified on the live wiki.

## Update to beta.9 (cumulative release)

This complete ZIP includes **all fixes from Beta 1–8** and adds higher-contrast
Timeless interface icons on dark backgrounds. It recolors only the icons, not
links, user names, notification counts, site logos, or article media.

- Page toolbar actions: Edit, Edit source, History, Talk, Watch, and more.
- Section-edit pencils, search button, old-style magnify icons.
- User/menu/tools symbols on desktop and narrow screens.
- Echo notification symbol layers and OOUI/Codex icon treatments.

Replace the whole `extensions/TimelessDarkMode/` directory; no configuration
changes or separate CSS files are needed. **Live site visual verification is
still required**, especially on small screens and with third-party gadgets.

## Update to beta.8 (cumulative release)

This is a **complete replacement ZIP**, including **every fix from Beta 1–7**.
Replace the existing `extensions/TimelessDarkMode/` folder with the folder
from the archive. No separate `.less` file or additional `LocalSettings.php`
configuration is needed; saved preferences remain intact.

**New in beta.8:** The edit-page copyright/licensing notice `#editpage-copywarn`
gets an explicitly dark `#111214` background, light `#e6eaf0` text, blue
`#91c5ff` links (with a brighter hover color), and muted border colors.
Previously, beta.7 only changed this notice's text color when nested inside
`.editOptions`, leaving its own/other light background untreated. These
new rules target `#editpage-copywarn` directly whether it appears inside
or outside `div.editOptions`, without hiding the notice or changing spacing.

Test with a standard wikitext edit page in **Dark**, **Light**, and
**Automatic** modes. If new colors do not appear after updating, perform a
hard refresh and clear the site's MediaWiki ResourceLoader cache if necessary.
Live visual verification remains to be done.

## Update to beta.7 (cumulative release)

This ZIP includes **every change from Beta 1–6**. Replace the installed
`extensions/TimelessDarkMode/` folder with the folder from this ZIP. Do **not**
install another `.less` file, alter `LocalSettings.php`, or reset preferences.

**New in beta.7:** Normal `[[File:...|thumb|...]]` and
`[[File:...|frame|...]]` article images now use a dark figure frame
(`#111214`), light captions (`#e6eaf0`), legible links, and muted borders.
The rules match `figure[typeof~='mw:File/Thumb']` and
`figure[typeof~='mw:File/Frame']`, rather than the incidental
`.mw-default-size` class, so both default- and custom-sized figures are
included. For compatibility, older `.thumbinner` and `.thumbcaption`
markup receives the same treatment.

These adjustments style **only the container and caption**. No image pixels
are inverted, dimmed, filtered, or recolored. The new rules activate only in
Timeless Dark or Automatic mode when the operating system prefers dark.

After updating, open an article with a `[[File:...|thumb]]` image, verify the
frame and caption are dark/readable, and compare Light mode. If nothing
changes after a hard reload, invalidate the ResourceLoader style cache. This
beta has not been visually verified on the production wiki.

## Update to beta.6 (cumulative release)

This ZIP **includes all previous Beta 1–5 changes**. Replace the installed
`extensions/TimelessDarkMode/` folder with the `TimelessDarkMode/` folder from
this ZIP. You do **not** need a separate LESS file, need to reconfigure
`LocalSettings.php`, or lose saved user preferences.

**New in beta.6:** Dark-mode compatibility for the article-header subpage
navigation supplied by [Extension:SubpageNavigation](https://www.mediawiki.org/wiki/Extension:SubpageNavigation).
Its own `resources/style.css` declares a pale `#f8f9fa` background and
`#a2a9b1` bottom border on `.subpageNavigation`. Our dark theme overrides
those two colors, plus navigation heading and link text, to use the existing
near-black `#111214` panel background, light labels, blue links, and muted
border. Subpage tree behavior, dimensions, and toggles are unchanged.

Test with a user page that has subpages, such as `User:BrantleyRider`, in
**Dark**, **Light**, and **Automatic** modes. In Chrome's inspector, a blue
highlight overlay represents the selected element; it is not the CSS color.

This is a styling beta and has not been browser-tested on the production wiki.

## Update to beta.5 (cumulative release)

This ZIP contains **all previous Beta 1–4 fixes**. Replace the existing
`extensions/TimelessDarkMode/` folder with the one inside this archive; no
separate `.less` file and no new `LocalSettings.php` entries are required.
Your saved user preferences are unaffected.

**New in beta.5:** Fixes the white *Active filters* region on
`Special:RecentChanges` (also shared with `Special:Watchlist` and related
changes). The actual white element is OOUI's parent
`.oo-ui-tagMultiselectWidget-handle`, which wraps
`.mw-rcfilters-ui-filterTagMultiselectWidget-wrapper-top-queryName`.
The dark theme now overrides the handle's light background, text labels,
filter input and tag chips while retaining the layout and functionality.
The panel uses near-black `#111214`, light labels, blue links and visible
OOUI icons. The rules are scoped to Timeless Dark / Automatic mode and the
rcfilters widget; ordinary Timeless Light is unchanged.

After installing, clear/reload cached ResourceLoader styles if needed and
hard-refresh Special:RecentChanges. Check the active filters strip, the
Hide action, filter chips and the filters dropdown. Also test Watchlist,
the Light setting, and Automatic when the OS is in dark mode. This release
is a styling beta; visual behavior needs confirmation on your wiki.

## Update to beta.4 (cumulative release)

Replace your current `extensions/TimelessDarkMode/` directory with the
`TimelessDarkMode/` folder from this ZIP. **You do not need to separately
install a `.less` file**. The ZIP already includes all Beta 1–3 updates:
preferences (Light/Dark/Automatic), dark navigation and preference panels,
and infobox CSS variables.

**New in beta.4:** `resources/dark.less` now styles the standard wikitext
editor's `div.editOptions` area. This is the edit-summary, minor edit/watch
page, copyright warning, and save/preview controls below the source editor.
The panel becomes near-black (`#111214`) with readable light labels, blue
links, and themed native checkboxes. The underlying textarea, buttons and
form layout are not rearranged. No PHP settings, hooks or preference values
were changed.

After updating, hard-refresh an `action=edit` page in Timeless Dark mode.
Check the bottom of the editing form, especially the edit-summary field,
minor/watch labels, the legal notice and the Save/Preview/Diff buttons.
Repeat the check in Light mode, which should remain unchanged. If styles
appear stale, refresh MediaWiki's ResourceLoader cache before retesting.

This is a **beta**, visually tested only through the screenshots supplied
for ReformedWiki; it has not been installed or browser-tested on that server.

## Update from beta.2 to beta.3

1. Replace `extensions/TimelessDarkMode/` with this ZIP's folder. Existing
   `LocalSettings.php` configuration and saved preferences stay the same.
2. Hard refresh an article using `Template:Infobox person` while Timeless
   is set to **Dark**; confirm the infobox is dark with light text and blue links.
3. Verify **Light** returns the original infobox colors, and **Automatic**
   changes the infobox according to OS color preferences.

**What changed:** `resources/dark.less` now overrides the CSS custom
properties `--ib-bg`, `--ib-border`, and `--ib-text` on the actual infobox
container, including `infobox_...` variants. The infobox background uses the
near-black `#111214` palette, consistent with Timeless navigation. For ordinary `.infobox` containers
that do not use variables, a dark fallback background/text/border is also set.
This does not globally recolor all template content or inline-styled elements.

### Why an override on `body` does not work

`Template:Infobox_person/styles.css` declares the `--ib-` variables **on the
`.infobox_person` element itself**. Locally specified CSS custom properties
win over values inherited from ancestors. The extension must override the
variables on the infobox element using a more specific selector. TemplateStyles
also scopes selectors under `.mw-parser-output` and loads after site CSS, so
this patch uses a specific `body.skin-timeless.timelessdarkmode-...` selector.

If another infobox template defines different variable names or hard-codes
backgrounds on child rows, it may need a targeted rule. Verify visual
appearance on a real wiki before production deployment.

## Changes in beta.2

1. Replace the existing `extensions/TimelessDarkMode/` files with this version
   (keep the same directory name).
2. Leave your existing `wfLoadExtension( 'TimelessDarkMode' );` line in
   `LocalSettings.php` unchanged. User preferences remain unchanged.
3. Purge the MediaWiki ResourceLoader cache if needed, then hard-refresh the
   page (`Ctrl+Shift+R` or `Cmd+Shift+R`).
4. In Dark mode, check both left and right sidebar panels and the
   Special:Preferences tab strip and sticky Save bar.

**Beta.2 changes:** dark near-black navigation cards (`#111214`) with white
headings and blue links; dark Preferences tab strip, selected/inactive tabs,
fieldset surfaces and Save bar; a dark mobile navigation flyout; and stronger
CSS selector specificity to override Timeless's default light backgrounds.
No PHP hooks or preference values changed.

**Site-specific logos:** A black logo on a transparent image can still be hard
 to see on a dark background. This extension intentionally does not invert
 images. Supply a light-colored logo asset or an optional custom logo rule.

## Install (standard MediaWiki installation)

1. Back up the wiki installation and `LocalSettings.php`.
2. Extract the ZIP file to the MediaWiki `extensions/` directory so that the
   full path is `extensions/TimelessDarkMode/extension.json`.
3. Add this line to `LocalSettings.php` **after** the Timeless skin is loaded:

   ```php
   wfLoadExtension( 'TimelessDarkMode' );
   ```

4. Visit `Special:Version`: you should see **TimelessDarkMode** under installed
   extensions. If you don't, check the PHP/MediaWiki error log.
5. In `Special:Preferences → Appearance` select **Timeless** as your skin and
   choose **Dark** under **Timeless color theme**, then save.
6. Check a normal article, a Special page, mobile width, editing dialogs,
   and templates/infoboxes in both modes before enabling for other users.

**No database migrations** or `update.php` are expected: only a user option is
persisted using MediaWiki's existing preferences storage.

## Bitnami installations

The MediaWiki install path depends on the Bitnami image/release. Find the
MediaWiki root by locating `LocalSettings.php`, then use that installation's
`extensions/` directory. Do not blindly assume a path.

For example (adapt the paths):

```bash
cd /path/to/mediawiki
unzip /path/to/TimelessDarkMode.zip -d extensions/
# Edit LocalSettings.php and add wfLoadExtension( 'TimelessDarkMode' );
```

For a Composer / deployment-based MediaWiki install, include the extension in
its deployment packaging instead of modifying an ephemeral runtime container.

## Default for guests and new users

Default is Light. To make automatic (or dark) the default, add **after**
`wfLoadExtension( 'TimelessDarkMode' );` in `LocalSettings.php`:

```php
$wgDefaultUserOptions['timelessdarkmode-mode'] = 'auto';
// Or 'light' / 'dark'
```

`Special:Preferences` is available to signed-in users. Logged-out visitors
follow the site's default. This version does not supply an on-page toggle or
a cookie-based mode switch for anonymous users.

## Customize colors

Edit the palette variables at the beginning of `resources/dark.less` and
refresh with a hard reload (Ctrl/Command + Shift + R). If the change doesn't
appear, purge/refresh ResourceLoader cache according to your MediaWiki setup.
The theme's color rules are one LESS mixin used in both Dark and Automatic
modes. CSS is applied only to `body.skin-timeless` with the relevant mode class.

## Troubleshooting

**No preference appears:** Check `Special:Version` for the extension and reload
`Special:Preferences`. Verify the English i18n file is present.

**Preference saves but colors don't change:** Inspect the `<body>` class; it
should contain `skin-timeless timelessdarkmode-dark` when you choose Dark.
Confirm `ext.timelessDarkMode.styles` loads successfully in the Network tab.
If ResourceLoader gives an error, check PHP logs and LESS compilation output.

**Styles are partly white:** Hard-coded colors in custom wiki templates,
TemplateStyles, gadgets, extensions, VisualEditor/OOUI/Codex dialogs, etc.
may require additional selectors. Version 1.0.0 handles common Timeless areas but
has NOT been visually tested against your installed extensions/site content.

**User still sees Light:** Check whether they have a different skin selected,
which intentionally disables this theme.

**Want to roll back:** Remove or comment out `wfLoadExtension( 'TimelessDarkMode' );`
and reload. The regular Timeless skin stays untouched; saved theme preferences
are inert. The extension directory can then be removed.

## Testing and scope

Code and JSON were syntax-checked in an isolated environment, but this package
has **not** been installed on a real MediaWiki 1.43 site or tested in a browser.
Run checks on a staging wiki before production rollout. No guarantee is made
for MediaWiki 1.44+ or other skins. No MediaWiki core changes are necessary.

Source references:
- https://www.mediawiki.org/wiki/Manual:Hooks/GetPreferences
- https://www.mediawiki.org/wiki/Manual:Hooks/BeforePageDisplay
- https://www.mediawiki.org/wiki/Manual:Hooks/OutputPageBodyAttributes
- https://github.com/wikimedia/mediawiki-skins-Timeless/tree/REL1_43

## License

MIT; see `LICENSE`.

## Beta 9: light interface icons (Timeless only)

Dark mode now recolors the following Timeless interface icons to white while
retaining the original SVG artwork:

- Article actions (Edit, View source, History, Discussion, Watch, etc.).
- Section edit pencil, search and magnify controls.
- Desktop user symbol and mobile menu/gear/user symbols.
- Echo notification symbols (but *not* colored unread-number counters).
- OOUI icons/indicators and Codex icons that inherit text color.

These are scoped to Timeless dark/automatic-dark mode only. **The Vector-specific
`.vector-icon` selector is not what Timeless uses for most of its icons.**

For Timeless action links containing words, the rule moves the original
`background-image` onto a `::before` pseudo-element and filters just that layer;
filtering the link itself would change its text/link colors. Existing dark mode
changes from Beta 1–8 are retained. Custom icons added by gadgets or extensions
may need additional selectors.

