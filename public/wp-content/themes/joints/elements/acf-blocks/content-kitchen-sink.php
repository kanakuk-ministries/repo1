<?php
/**
 * Block Name: 4-Image
 *
 * This is the template that displays 4 images in a block.
 */

// the fields
$fields = get_fields();

// write data to console for debugging purposes
console_log(__FILE__, $fields);

?>

<div class="grid-container">
    <div class="grid-x">
        <!-- TYPOGRAPHY SECTION -->
        <div class="cell">
            <h2 id="typography" class="docs-heading" data-magellan-target="typography">
                Typography
                <a class="docs-heading-icon" href="#typography"></a>
            </h2>

            <div class="docs-code-live">
                <div style="display: flex; flex-direction: row; align-items: flex-start; justify-content: flex-start;">
                    <div>
                        <h1>Heading 1</h1>
                        <h2>Heading 2</h2>
                        <h3>Heading 3</h3>
                        <h4>Heading 4</h4>
                        <h5>Heading 5</h5>
                        <h6>Heading 6</h6>
                    </div>
                    <div style="margin-left: 100px;">
                        <h1 class="secondary">Heading 1</h1>
                        <h2 class="secondary">Heading 2</h2>
                        <h3 class="secondary">Heading 3</h3>
                        <h4 class="secondary">Heading 4</h4>
                        <h5 class="secondary">Heading 5</h5>
                        <h6 class="secondary">Heading 6</h6>
                    </div>
                </div>

                <h1 class="display">Display 1</h1>
                <p>Paragraph text here. Lorem ipsum set dolor.</p>
                <a href="https://www.google.com">Link Text</a>
            </div>
            <hr>
        </div>


        <!-- ACCORDION SECTION -->
        <div class="cell">
            <h2 id="accordion" class="docs-heading" data-magellan-target="accordion">Accordion<a class="docs-heading-icon" href="#accordion"></a></h2>

            <div class="docs-code-live">
                <ul class="accordion" data-accordion="qib3gd-accordion" role="tablist">
                    <li class="accordion-item is-active" data-accordion-item="">
                        <a href="#" class="accordion-title" aria-controls="0vasfl-accordion" role="tab" id="0vasfl-accordion-label" aria-expanded="true" aria-selected="true">Accordion 1</a>
                        <div class="accordion-content" data-tab-content="" role="tabpanel" aria-labelledby="0vasfl-accordion-label" aria-hidden="false" id="0vasfl-accordion" style="display: block;">
                            <p>Panel 1. Lorem ipsum dolor</p>
                            <a href="#">Nowhere to Go</a>
                        </div>
                    </li>
                    <li class="accordion-item" data-accordion-item="">
                        <a href="#" class="accordion-title" aria-controls="a3oiqi-accordion" role="tab" id="a3oiqi-accordion-label" aria-expanded="false" aria-selected="false">Accordion 2</a>
                        <div class="accordion-content" data-tab-content="" role="tabpanel" aria-labelledby="a3oiqi-accordion-label" aria-hidden="true" id="a3oiqi-accordion">
                            <textarea></textarea>
                            <button class="button">I do nothing!</button>
                        </div>
                    </li>
                    <li class="accordion-item" data-accordion-item="">
                        <a href="#" class="accordion-title" aria-controls="gcpmso-accordion" role="tab" id="gcpmso-accordion-label" aria-expanded="false" aria-selected="false">Accordion 3</a>
                        <div class="accordion-content" data-tab-content="" role="tabpanel" aria-labelledby="gcpmso-accordion-label" aria-hidden="true" id="gcpmso-accordion">
                            Type your name!
                            <input type="text">
                        </div>
                    </li>
                </ul>
            </div>

            <hr>
        </div>

        <!-- ACCORDION MENU SECTION -->
        <div class="cell">

            <h2 id="accordion-menu" class="docs-heading" data-magellan-target="accordion-menu">Accordion Menu<a class="docs-heading-icon" href="#accordion-menu"></a></h2>

            <div class="docs-code-live">
                <ul class="vertical menu" data-accordion-menu="e31k6n-accordion-menu" role="tree" aria-multiselectable="true">
                    <li role="treeitem" class="is-accordion-submenu-parent" aria-controls="jv6eun-acc-menu" aria-expanded="true" id="nygxmb-acc-menu-link">
                        <a href="#0">Item 1</a>
                        <ul class="menu vertical nested is-active submenu is-accordion-submenu" data-submenu="" role="group" aria-labelledby="nygxmb-acc-menu-link" aria-hidden="false" id="jv6eun-acc-menu">
                            <li role="treeitem" class="is-accordion-submenu-parent is-submenu-item is-accordion-submenu-item" aria-controls="eo0ryc-acc-menu" aria-expanded="false" id="kj3g1n-acc-menu-link">
                                <a href="#0">Item 1A</a>
                                <ul class="menu vertical nested submenu is-accordion-submenu" data-submenu="" role="group" aria-labelledby="kj3g1n-acc-menu-link" aria-hidden="true" id="eo0ryc-acc-menu" style="display: none;">
                                    <li role="treeitem" class="is-submenu-item is-accordion-submenu-item"><a href="#0">Item 1Ai</a></li>
                                    <li role="treeitem" class="is-submenu-item is-accordion-submenu-item"><a href="#0">Item
                                            1Aii</a></li>
                                    <li role="treeitem" class="is-submenu-item is-accordion-submenu-item"><a href="#0">Item
                                            1Aiii</a></li>
                                </ul>
                            </li>
                            <li role="treeitem" class="is-submenu-item is-accordion-submenu-item"><a href="#0">Item 1B</a></li>
                            <li role="treeitem" class="is-submenu-item is-accordion-submenu-item"><a href="#0">Item 1C</a></li>
                        </ul>
                    </li>
                    <li role="treeitem" class="is-accordion-submenu-parent" aria-controls="v44iha-acc-menu" aria-expanded="false" id="2mx7ee-acc-menu-link">
                        <a href="#0">Item 2</a>
                        <ul class="menu vertical nested submenu is-accordion-submenu" data-submenu="" role="group" aria-labelledby="2mx7ee-acc-menu-link" aria-hidden="true" id="v44iha-acc-menu" style="display: none;">
                            <li role="treeitem" class="is-submenu-item is-accordion-submenu-item"><a href="#0">Item 2A</a></li>
                            <li role="treeitem" class="is-submenu-item is-accordion-submenu-item"><a href="#0">Item 2B</a></li>
                        </ul>
                    </li>
                    <li role="treeitem"><a href="#0">Item 3</a></li>
                </ul>
            </div>

            <hr>
        </div>

        <div class="cell">

            <h2 id="badge" class="docs-heading" data-magellan-target="badge">Badge<a class="docs-heading-icon" href="#badge"></a></h2>

            <div class="docs-code-live" style="display: flex; flex-direction: row;">
                <span class="warning badge" style="margin-right: 10px;">3</span>
                <span class="primary badge" style="margin-right: 10px;">1</span>
                <span class="secondary badge" style="margin-right: 10px;">2</span>
                <span class="success badge" style="margin-right: 10px;">3</span>
                <span class="alert badge" style="margin-right: 10px;">A</span>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="breadcrumbs" class="docs-heading" data-magellan-target="breadcrumbs">
                Breadcrumbs
                <a class="docs-heading-icon" href="#breadcrumbs"></a>
            </h2>

            <div class="docs-code-live">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href="#0">Home</a></li>
                        <li><a href="#0">Features</a></li>
                        <li class="disabled">Gene Splicing</li>
                        <li>
                            <span class="show-for-sr">Current: </span> Cloning
                        </li>
                    </ul>
                </nav>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="button" class="docs-heading" data-magellan-target="button">
                Button
                <a class="docs-heading-icon" href="#button"></a>
            </h2>

            <div class="docs-code-live">
                <button class="tiny button">So Tiny</button>
                <button class="tiny button warning">So Tiny</button>
                <button class="tiny button hollow">So Tiny</button>
                <button class="tiny button warning hollow">So Tiny</button>
                <button class="tiny button white hollow">So Tiny</button>
                <br />
                <button class="small button">So Small</button>
                <button class="small button warning">So Small</button>
                <button class="small button hollow">So Small</button>
                <button class="small button warning hollow">So Small</button>
                <button class="small button white hollow">So Small</button>
                <br />
                <button class="button">Default</button>
                <button class="button warning">Default</button>
                <button class="button hollow">Default</button>
                <button class="button warning hollow">Default</button>
                <button class="button white hollow">Default</button>
                <br />
                <button class="large button">So Large</button>
                <button class="large button warning">So Large</button>
                <button class="large button hollow">So Large</button>
                <button class="large button warning hollow">So Large</button>
                <button class="large button white hollow">So Large</button>
                <br />
                <button class="button" disabled>Default Disabled</button>
                <button class="button warning" disabled>Default Disabled</button>
                <button class="button hollow" disabled>Default Disabled</button>
                <button class="button warning hollow" disabled>Default Disabled</button>
                <button class="button white hollow" disabled>Default Disabled</button>
                <br />
                <button class="expanded button">Full Width</button>
                <button class="expanded button warning">Full Width</button>
                <button class="expanded button hollow">Full Width</button>
                <button class="expanded button warning hollow">Full Width</button>
                <button class="expanded button white hollow">Full Width</button>
                <br />
                <button class="button success">Success</button>
                <button class="button alert">Alert</button>
                <!-- <div class="button-group">
            <a class="button">One</a>
            <a class="button">Two</a>
            <a class="button">Three</a>
        </div> -->
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="cards" class="docs-heading" data-magellan-target="cards">Cards<a class="docs-heading-icon" href="#cards"></a></h2>

            <div class="docs-code-live" style="display: flex; flex-direction: column; align-items: center;">
                <!-- no image -->
                <div class="card flat">
                    <div class="card-section full-width">
                        <p>This is a flat card without an image. Basically a white background container for whatever you want.</p>
                    </div>
                </div>


                <!-- image on left, has no padding -->
                <div class="card">
                    <div class="media-container">
                        <img src="<?php echo $fields['hero_image']['url']; ?>">
                    </div>
                    <div class="card-section">
                        <p>This is a simple card with an image.</p>
                    </div>
                </div>

                <!-- image on right, has no padding -->
                <div class="card">
                    <div class="card-section">
                        <p>Images work just fine below the content too!</p>
                    </div>
                    <div class="media-container">
                        <img src="<?php echo $fields['hero_image']['url']; ?>">
                    </div>
                </div>

                <!-- image on right, has no padding, small image -->
                <div class="card">
                    <div class="card-section">
                        <p>Smaller images use an extra class, "small" on the media container.</p>
                    </div>
                    <div class="media-container small">
                        <img src="<?php echo $fields['hero_image']['url']; ?>">
                    </div>
                </div>

                <!-- image on right, has no padding, small image, long text with set height -->
                <div class="card locked-height">
                    <div class="card-section">
                        <h3>Long Text Card Title</h3>
                        <p>For those LONG text cards. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                            occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                            esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                            in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum.</p>
                    </div>
                    <div class="media-container small">
                        <img src="<?php echo $fields['hero_image']['url']; ?>">
                    </div>
                </div>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="close-button" class="docs-heading" data-magellan-target="close-button">Close
                Button<a class="docs-heading-icon" href="#close-button"></a></h2>

            <div class="docs-code-live">
                <div class="callout" data-closable="">
                    <button class="close-button" aria-label="Close alert" type="button" data-close="">
                        <span aria-hidden="true">×</span>
                    </button>
                    <p>This is a close button example.</p>
                </div>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="drilldown-menu" class="docs-heading" data-magellan-target="drilldown-menu">Drilldown
                Menu<a class="docs-heading-icon" href="#drilldown-menu"></a></h2>

            <div class="docs-code-live">
                <div class="is-drilldown" style="min-height: 230.25px; max-width: 200px;">
                    <ul class="vertical menu drilldown" data-drilldown="243q4c-drilldown" style="width: 200px" id="m1" role="tree" aria-multiselectable="false" data-mutate="4lvnsb-drilldown">
                        <li role="treeitem" class="is-drilldown-submenu-parent" aria-haspopup="true" aria-label="Item 1" aria-expanded="false">
                            <a tabindex="0">Item 1</a>
                            <ul class="vertical menu submenu is-drilldown-submenu invisible drilldown-submenu-cover-previous" id="m2" data-submenu="" role="group" aria-hidden="true">
                                <li class="js-drilldown-back"><a tabindex="0">Back</a></li>
                                <li role="treeitem" class="is-drilldown-submenu-parent is-submenu-item is-drilldown-submenu-item" aria-haspopup="true" aria-label="Item 1A" aria-expanded="false">
                                    <a tabindex="0">Item 1A</a>
                                    <ul class="vertical menu submenu is-drilldown-submenu invisible drilldown-submenu-cover-previous" id="m3" data-submenu="" role="group" aria-hidden="true">
                                        <li class="js-drilldown-back"><a tabindex="0">Back</a></li>
                                        <li role="treeitem" class="is-submenu-item is-drilldown-submenu-item"><a href="#0">Item
                                                1Aa</a></li>
                                        <li role="treeitem" class="is-submenu-item is-drilldown-submenu-item"><a href="#0">Item
                                                1Ba</a></li>
                                        <li role="treeitem" class="is-submenu-item is-drilldown-submenu-item"><a href="#0">Item
                                                1Ca</a></li>
                                        <li role="treeitem" class="is-submenu-item is-drilldown-submenu-item"><a href="#0">Item
                                                1Da</a></li>
                                        <li role="treeitem" class="is-submenu-item is-drilldown-submenu-item"><a href="#0">Item
                                                1Ea</a></li>
                                    </ul>
                                </li>
                                <li role="treeitem" class="is-submenu-item is-drilldown-submenu-item"><a href="#0">Item 1B</a></li>
                                <li role="treeitem" class="is-submenu-item is-drilldown-submenu-item"><a href="#0">Item 1C</a></li>
                                <li role="treeitem" class="is-submenu-item is-drilldown-submenu-item"><a href="#0">Item 1D</a></li>
                                <li role="treeitem" class="is-submenu-item is-drilldown-submenu-item"><a href="#0">Item 1E</a></li>
                            </ul>
                        </li>
                        <li role="treeitem" class="is-drilldown-submenu-parent" aria-haspopup="true" aria-label="Item 2" aria-expanded="false">
                            <a tabindex="0">Item 2</a>
                            <ul class="vertical menu submenu is-drilldown-submenu invisible drilldown-submenu-cover-previous" data-submenu="" role="group" aria-hidden="true">
                                <li class="js-drilldown-back"><a tabindex="0">Back</a></li>
                                <li role="treeitem" class="is-submenu-item is-drilldown-submenu-item"><a href="#0">Item 2A</a></li>
                                <li role="treeitem" class="is-submenu-item is-drilldown-submenu-item"><a href="#0">Item 2B</a></li>
                                <li role="treeitem" class="is-submenu-item is-drilldown-submenu-item"><a href="#0">Item 2C</a></li>
                                <li role="treeitem" class="is-submenu-item is-drilldown-submenu-item"><a href="#0">Item 2D</a></li>
                                <li role="treeitem" class="is-submenu-item is-drilldown-submenu-item"><a href="#0">Item 2E</a></li>
                            </ul>
                        </li>
                        <li role="treeitem" class="is-drilldown-submenu-parent" aria-haspopup="true" aria-label="Item 3" aria-expanded="false">
                            <a tabindex="0">Item 3</a>
                            <ul class="vertical menu submenu is-drilldown-submenu invisible drilldown-submenu-cover-previous" data-submenu="" role="group" aria-hidden="true">
                                <li class="js-drilldown-back"><a tabindex="0">Back</a></li>
                                <li role="treeitem" class="is-submenu-item is-drilldown-submenu-item"><a href="#0">Item 3A</a></li>
                                <li role="treeitem" class="is-submenu-item is-drilldown-submenu-item"><a href="#0">Item 3B</a></li>
                                <li role="treeitem" class="is-submenu-item is-drilldown-submenu-item"><a href="#0">Item 3C</a></li>
                                <li role="treeitem" class="is-submenu-item is-drilldown-submenu-item"><a href="#0">Item 3D</a></li>
                                <li role="treeitem" class="is-submenu-item is-drilldown-submenu-item"><a href="#0">Item 3E</a></li>
                            </ul>
                        </li>
                        <li role="treeitem"><a href="#0"> Item 4</a></li>
                    </ul>
                </div>
            </div>

            <hr>
        </div>


        <div class="cell">
            <h2 id="dropdown-menu" class="docs-heading" data-magellan-target="dropdown-menu">
                Dropdown Menu
                <a class="docs-heading-icon" href="#dropdown-menu"></a>
            </h2>

            <div class="docs-code-live">
                <ul class="dropdown menu white" data-dropdown-menu data-click-open="true">
                    <li role="menuitem" class="is-dropdown-submenu-parent opens-right" aria-haspopup="true" aria-label="Item 1">
                        <a>Item 1</a>
                        <ul class="menu submenu is-dropdown-submenu first-sub vertical" data-submenu="" role="menubar">
                            <div class="dropdown-triangle"></div>
                            <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#0">Item 1A Loooong</a></li>
                            <li role="menuitem" class="is-dropdown-submenu-parent is-submenu-item is-dropdown-submenu-item opens-right" aria-haspopup="true" aria-label=" Item 1 sub">
                                <a href="#0"> Item 1 sub</a>
                                <ul class="menu submenu is-dropdown-submenu vertical" data-submenu="" role="menubar">
                                    <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#0">Item 1
                                            subA</a></li>
                                    <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#0">Item 1
                                            subB</a></li>
                                    <li role="menuitem" class="is-dropdown-submenu-parent is-submenu-item is-dropdown-submenu-item opens-right" aria-haspopup="true" aria-label=" Item 1 sub">
                                        <a href="#0"> Item 1 sub</a>
                                        <ul class="menu submenu is-dropdown-submenu vertical" data-submenu="" role="menubar">
                                            <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#0">Item
                                                    1 subA</a></li>
                                            <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#0">Item
                                                    1 subB</a></li>
                                        </ul>
                                    </li>
                                    <li role="menuitem" class="is-dropdown-submenu-parent is-submenu-item is-dropdown-submenu-item opens-right" aria-haspopup="true" aria-label=" Item 1 sub">
                                        <a href="#0"> Item 1 sub</a>
                                        <ul class="menu submenu is-dropdown-submenu vertical" data-submenu="" role="menubar">
                                            <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#0">Item
                                                    1 subA</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#0">Item 1B</a></li>
                        </ul>
                    </li>
                    <li role="menuitem" class="is-dropdown-submenu-parent opens-right" aria-haspopup="true" aria-label="Item 2">
                        <a href="#0">Item 2</a>
                        <ul class="menu submenu is-dropdown-submenu first-sub vertical" data-submenu="" role="menubar">
                            <div class="dropdown-triangle"></div>
                            <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#0">Item 2A</a></li>
                            <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#0">Item 2B</a></li>
                        </ul>
                    </li>
                    <li role="menuitem"><a href="#0">Item 3</a></li>
                    <li role="menuitem"><a href="#0">Item 4</a></li>
                </ul>
                <ul class="dropdown menu" data-dropdown-menu data-click-open="true">
                    <li role="menuitem" class="is-dropdown-submenu-parent opens-right" aria-haspopup="true" aria-label="Item 2">
                        <a href="#0">Item 2</a>
                        <ul class="menu submenu is-dropdown-submenu first-sub vertical" data-submenu="" role="menubar">
                            <div class="dropdown-triangle"></div>
                            <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#0">Item 2A</a></li>
                            <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#0">Item 2B</a></li>
                        </ul>
                    </li>
                    <li role="menuitem"><a href="#0">Item 3</a></li>
                    <li role="menuitem"><a href="#0">Item 4</a></li>
                </ul>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="dropdown-pane" class="docs-heading" data-magellan-target="dropdown-pane">Dropdown
                Pane / Tooltip<a class="docs-heading-icon" href="#dropdown-pane"></a></h2>

            <div class="docs-code-live">
                <button class="button" type="button" data-toggle="example-dropdown" aria-controls="example-dropdown" data-is-focus="false" data-yeti-box="example-dropdown" aria-haspopup="true" aria-expanded="false" id="c851xo-dd-anchor">Bottom Left</button>
                <div class="dropdown-pane" id="example-dropdown" data-dropdown data-close-on-click="true" data-v-offset="20" data-position="bottom" data-alignment="left">
                    <div class="tooltip-triangle"></div>
                    Just some junk that needs to be said. Or not. Your choice.
                </div>

                <button class="button" type="button" data-toggle="example-dropdown-2">Toggle Initially Open Tooltip</button>
                <div class="dropdown-pane" id="example-dropdown-2" data-dropdown data-close-on-click="true" data-v-offset="20" data-position="bottom" data-alignment="center">
                    <div class="tooltip-triangle"></div>
                    I'm open right from the start!! Click my button to hide me.
                </div>

                <button class="button" type="button" data-toggle="example-dropdown-3">Toggle Tooltip with Close</button>
                <div class="dropdown-pane" id="example-dropdown-3" data-dropdown data-close-on-click="true" data-h-offset="-50" data-v-offset="20" data-position="bottom" data-alignment="right">
                    <div class="tooltip-triangle"></div>
                    I require a user to click close.
                    <button class="close-button" aria-label="Close alert" type="button" data-close="">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <button class="button" type="button" data-toggle="example-dropdown-4">Top Center</button>
                <div class="dropdown-pane" id="example-dropdown-4" data-dropdown data-close-on-click="true" data-v-offset="20" data-position="top" data-alignment="center">
                    <div class="tooltip-triangle"></div>
                    Just some junk that needs to be said. Or not. Your choice.
                </div>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="equalizer" class="docs-heading" data-magellan-target="equalizer">Equalizer<a class="docs-heading-icon" href="#equalizer"></a></h2>

            <div class="docs-code-live">
                <div class="grid-x grid-margin-x" data-equalizer="60xxzr-equalizer" data-equalize-on="medium" id="test-eq" data-resize="r89hft-eq" data-mutate="ipjbyk-eq" data-events="mutate">
                    <div class="cell medium-4">
                        <div class="callout" data-equalizer-watch="" style="height: 262px;">
                            <img src="<?php echo $fields['hero_image']['url']; ?>">
                        </div>
                    </div>
                    <div class="cell medium-4">
                        <div class="callout" data-equalizer-watch="" style="height: 262px;">
                            <p>Pellentesque habitant morbi tristique senectus et netus et, ante.</p>
                        </div>
                    </div>
                    <div class="cell medium-4">
                        <div class="callout" data-equalizer-watch="" style="height: 262px;">
                            <img src="<?php echo $fields['hero_image']['url']; ?>">
                        </div>
                    </div>
                </div>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="responsive-embed" class="docs-heading" data-magellan-target="responsive-embed">Responsive
                Embed<a class="docs-heading-icon" href="#responsive-embed"></a></h2>

            <div class="docs-code-live">
                <div class="responsive-embed">
                    <iframe width="420" height="315" src="https://www.youtube.com/embed/mM5_T-F1Yn4" frameborder="0" allowfullscreen=""></iframe>
                </div>
            </div>

            <hr>
        </div>

        <div class="cell">

            <h2 id="forms" class="docs-heading" data-magellan-target="forms">
                Forms
                <a class="docs-heading-icon" href="#forms"></a>
            </h2>
            <div class="docs-code-live">
                <form>
                    <label>Input Label
                        <input type="text" placeholder=".small-12.columns" aria-describedby="exampleHelpText">
                    </label>
                    <p class="help-text" id="exampleHelpText">Here's how you use this input field!</p>
                    <label>
                        How many puppies?
                        <input type="number" value="100">
                    </label>
                    <label class="input-icon">
                        Input with icon.
                        <input class="input-icon" type="text">
                        <i class="icon icon-field-calendar"></i>
                    </label>
                    <label class="input-icon">
                        Input with icon off.
                        <input class="input-icon" type="text">
                        <i class="icon icon-field-eye-off off"></i>
                    </label>
                    <label>
                        What books did you read over summer break?
                        <textarea placeholder="None"></textarea>
                    </label>
                    <label>Select Menu
                        <select>
                            <option value="husker">Husker</option>
                            <option value="starbuck">Starbuck</option>
                            <option value="hotdog">Hot Dog</option>
                            <option value="apollo">Apollo</option>
                        </select>
                    </label>
                    <div class="grid-x grid-margin-x">
                        <fieldset class="cell large-6">
                            <legend>Choose Your Favorite</legend>
                            <div class="radio-container" style="margin-bottom: 10px;">
                                <input type="radio" name="pokemon" value="Red" id="formRed" required=""><label for="formRed">Red</label>
                            </div>
                            <div class="radio-container" style="margin-bottom: 10px;">
                                <input type="radio" name="pokemon" value="Blue" id="formBlue"><label for="formBlue">Blue</label>
                            </div>
                            <div class="radio-container" style="margin-bottom: 10px;">
                                <input type="radio" name="pokemon" value="Yellow" id="formYellow"><label for="formYellow">Yellow</label>
                            </div>
                        </fieldset>
                        <fieldset class="cell large-6">
                            <legend>Check these out</legend>
                            <div class="checkbox-container" style="margin-bottom: 10px;">
                                <input id="formCheckbox1" type="checkbox"><label for="formCheckbox1">Checkbox 1</label>
                            </div>
                            <div class="checkbox-container" style="margin-bottom: 10px;">
                                <input id="formCheckbox2" type="checkbox"><label for="formCheckbox2">Checkbox 2</label>
                            </div>
                            <div class="checkbox-container" style="margin-bottom: 10px;">
                                <input id="formCheckbox3" type="checkbox"><label for="formCheckbox3">Checkbox 3</label>
                            </div>
                        </fieldset>
                    </div>
                    <div class="input-group">
                        <span class="input-group-label">$</span>
                        <input class="input-group-field" type="url">
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Submit">
                        </div>
                    </div>
                </form>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="label" class="docs-heading" data-magellan-target="label">Label<a class="docs-heading-icon" href="#label"></a></h2>
            <div class="docs-code-live">
                <span class="primary label">Primary Label</span>
                <span class="secondary label">Secondary Label</span>
                <span class="success label">Success Label</span>
                <span class="alert label">Alert Label</span>
                <span class="warning label">Warning Label</span>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="media-object" class="docs-heading" data-magellan-target="media-object">Media
                Object<a class="docs-heading-icon" href="#media-object"></a></h2>
            <div class="docs-code-live">
                <div class="media-object">
                    <div class="media-object-section">
                        <img src="<?php echo $fields['hero_image']['url']; ?>">
                    </div>
                    <div class="media-object-section">
                        <h4>Dreams feel real while we're in them.</h4>
                        <p>I'm going to improvise. Listen, there's something you should know about me... about inception. An
                            idea is like a virus, resilient, highly contagious. The smallest seed of an idea can grow. It can
                            grow to define or destroy you.</p>
                    </div>
                </div>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="menu" class="docs-heading" data-magellan-target="menu">Menu<a class="docs-heading-icon" href="#menu"></a></h2>
            <div class="docs-code-live">
                <ul class="menu">
                    <li><a href="#0"><i class="fi-list"></i> <span>One</span></a></li>
                    <li><a href="#0"><i class="fi-list"></i> <span>Two</span></a></li>
                    <li><a href="#0"><i class="fi-list"></i> <span>Three</span></a></li>
                    <li><a href="#0"><i class="fi-list"></i> <span>Four</span></a></li>
                </ul>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="off-canvas" class="docs-heading" data-magellan-target="off-canvas">Off-canvas<a class="docs-heading-icon" href="#off-canvas"></a></h2>
            <div class="docs-code-live">
                <div class="off-canvas-wrapper">
                    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper="">
                        <div class="off-canvas position-left is-transition-push is-closed" id="offCanvasLeft" data-off-canvas="fhbaw7-off-canvas" aria-hidden="true"></div>
                        <div class="js-off-canvas-overlay is-overlay-fixed"></div>
                        <div class="off-canvas position-right is-transition-push is-closed" id="offCanvasRight" data-off-canvas="c7deiu-off-canvas" data-position="right" aria-hidden="true"></div>
                        <div class="js-off-canvas-overlay is-overlay-fixed"></div>
                        <div class="off-canvas-content" data-off-canvas-content=""></div>
                    </div>
                </div>
                <button type="button" class="button" data-toggle="offCanvasLeft" aria-expanded="false" aria-controls="offCanvasLeft">Open
                    Menu</button>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="orbit" class="docs-heading" data-magellan-target="orbit">Orbit<a class="docs-heading-icon" href="#orbit"></a></h2>
            <div class="docs-code-live">
                <div class="orbit" role="region" aria-label="Favorite Text Ever" data-orbit="fjnsch-orbit" data-resize="dmlft8-orbit" id="dmlft8-orbit" data-events="resize">
                    <ul class="orbit-container" tabindex="0" style="height: 206px;">
                        <button class="orbit-previous" aria-label="previous" tabindex="0">
                            <span class="show-for-sr">Previous Slide</span>
                            ◀
                        </button>
                        <button class="orbit-next" aria-label="next" tabindex="0">
                            <span class="show-for-sr">Next Slide</span>
                            ▶
                        </button>
                        <li class="orbit-slide" data-slide="0" style="display: none;">
                            <div class="docs-example-orbit-slide">
                                <p><strong>This is dodgerblue.</strong> Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                        </li>
                        <li class="orbit-slide" data-slide="1" style="display: none;">
                            <div class="docs-example-orbit-slide">
                                <p><strong>This is rebeccapurple.</strong> Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                        </li>
                        <li class="orbit-slide" data-slide="2" style="display: none;">
                            <div class="docs-example-orbit-slide">
                                <p><strong>This is darkgoldenrod.</strong> Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                        </li>
                        <li class="orbit-slide is-active" data-slide="3" style="display: block;" aria-live="polite">
                            <div class="docs-example-orbit-slide">
                                <p><strong>This is lightseagreen.</strong> Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                        </li>
                    </ul>
                    <nav class="orbit-bullets">
                        <button class="" data-slide="0"><span class="show-for-sr">First slide details.</span></button>
                        <button data-slide="1" class=""><span class="show-for-sr">Second slide details.</span></button>
                        <button data-slide="2" class=""><span class="show-for-sr">Third slide details.</span></button>
                        <button data-slide="3" class="is-active"><span class="show-for-sr">Fourth slide details.</span><span class="show-for-sr">Current Slide</span></button>
                    </nav>
                </div>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="pagination" class="docs-heading" data-magellan-target="pagination">Pagination<a class="docs-heading-icon" href="#pagination"></a></h2>
            <div class="docs-code-live">
                <ul class="pagination" role="navigation" aria-label="Pagination">
                    <li class="disabled">Previous <span class="show-for-sr">page</span></li>
                    <li class="current"><span class="show-for-sr">You're on page</span> 1</li>
                    <li><a href="#0" aria-label="Page 2">2</a></li>
                    <li><a href="#0" aria-label="Page 3">3</a></li>
                    <li><a href="#0" aria-label="Page 4">4</a></li>
                    <li class="ellipsis" aria-hidden="true"></li>
                    <li><a href="#0" aria-label="Page 12">12</a></li>
                    <li><a href="#0" aria-label="Page 13">13</a></li>
                    <li><a href="#0" aria-label="Next page">Next <span class="show-for-sr">page</span></a></li>
                </ul>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="progress-bar" class="docs-heading" data-magellan-target="progress-bar">Progress
                Bar<a class="docs-heading-icon" href="#progress-bar"></a></h2>
            <div class="docs-code-live">
                <div class="primary progress" role="progressbar" tabindex="0" aria-valuenow="25" aria-valuemin="0" aria-valuetext="25 percent" aria-valuemax="100">
                    <div class="progress-meter" style="width: 25%">
                        <p class="progress-meter-text">25%</p>
                    </div>
                </div>
                <div class="warning progress">
                    <div class="progress-meter" style="width: 50%">
                        <p class="progress-meter-text">50%</p>
                    </div>
                </div>
                <div class="alert progress">
                    <div class="progress-meter" style="width: 75%">
                        <p class="progress-meter-text">75%</p>
                    </div>
                </div>
                <div class="success progress" role="progressbar" tabindex="0" aria-valuenow="100" aria-valuemin="0" aria-valuetext="100 percent" aria-valuemax="100">
                    <div class="progress-meter" style="width: 100%">
                        <p class="progress-meter-text">100%</p>
                    </div>
                </div>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="responsive-menu" class="docs-heading" data-magellan-target="responsive-menu">Responsive
                Menu<a class="docs-heading-icon" href="#responsive-menu"></a></h2>
            <div class="docs-code-live">
                <ul class="vertical medium-horizontal menu">
                    <li><a href="#0"><i class="fi-list"></i> <span>One</span></a></li>
                    <li><a href="#0"><i class="fi-list"></i> <span>Two</span></a></li>
                    <li><a href="#0"><i class="fi-list"></i> <span>Three</span></a></li>
                    <li><a href="#0"><i class="fi-list"></i> <span>Four</span></a></li>
                </ul>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="responsive-toggle" class="docs-heading" data-magellan-target="responsive-toggle">Responsive
                Toggle<a class="docs-heading-icon" href="#responsive-toggle"></a></h2>
            <div class="docs-code-live">
                <div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium" style="display: none;">
                    <button class="menu-icon" type="button" data-toggle=""></button>
                    <div class="title-bar-title">Menu</div>
                </div>
                <div class="top-bar" id="example-menu">
                    <div class="top-bar-left">
                        <ul class="dropdown menu" data-dropdown-menu="0ffev7-dropdown-menu" role="menubar">
                            <li class="menu-text" role="menuitem">Site Title</li>
                            <li class="has-submenu is-dropdown-submenu-parent opens-right" role="menuitem" aria-haspopup="true" aria-label="One">
                                <a href="#0">One</a>
                                <ul class="submenu menu vertical is-dropdown-submenu first-sub" data-submenu="" role="menubar">
                                    <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#0">One</a></li>
                                    <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#0">Two</a></li>
                                    <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="#0">Three</a></li>
                                </ul>
                            </li>
                            <li role="menuitem"><a href="#0">Two</a></li>
                            <li role="menuitem"><a href="#0">Three</a></li>
                        </ul>
                    </div>
                    <div class="top-bar-right">
                        <ul class="menu">
                            <li><input type="search" placeholder="Search"></li>
                            <li><button type="button" class="button">Search</button></li>
                        </ul>
                    </div>
                </div>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="reveal" class="docs-heading" data-magellan-target="reveal">
                Reveal
                <a class="docs-heading-icon" href="#reveal"></a>
            </h2>
            <div class="docs-code-live">
                <p>
                    <a data-open="exampleModal1">Click me for a modal</a>
                </p>
            </div>
            <div class="reveal" id="exampleModal1" data-reveal>
                <h1>Awesome. I Have It.</h1>
                <p class="lead">Your couch. It is mine.</p>
                <p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>
                <button class="close-button small" data-close aria-label="Close modal" type="button">
                    <span aria-hidden="true">Close</span>
                </button>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="slider" class="docs-heading" data-magellan-target="slider">Slider<a class="docs-heading-icon" href="#slider"></a></h2>
            <div class="docs-code-live">
                <div class="slider" data-slider="e1t8uk-slider" data-initial-start="50" data-end="200">
                    <span class="slider-handle" data-slider-handle="" role="slider" tabindex="0" aria-controls="njo67p-slider" aria-valuemax="200" aria-valuemin="0" aria-valuenow="50" aria-orientation="horizontal" style="left: 24.34%;"></span>
                    <span class="slider-fill" data-slider-fill="" style="width: 25%;"></span>
                    <input type="hidden" id="njo67p-slider" max="200" min="0" step="1" value="50">
                </div>
                <div class="slider vertical" data-slider="5vjs89-slider" data-initial-start="25" data-end="200" data-vertical="true">
                    <span class="slider-handle" data-slider-handle="" role="slider" tabindex="0" aria-controls="k4lki4-slider" aria-valuemax="200" aria-valuemin="0" aria-valuenow="25" aria-orientation="vertical" style="top: 11.54%;"></span>
                    <span class="slider-fill" data-slider-fill="" style="height: 13%;"></span>
                    <input type="hidden" id="k4lki4-slider" max="200" min="0" step="1" value="25">
                </div>
                <div class="slider" data-slider="c3thzb-slider" data-initial-start="25" data-initial-end="75">
                    <span class="slider-handle" data-slider-handle="" role="slider" tabindex="0" aria-controls="e48th7-slider" aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" aria-orientation="horizontal" style="left: 24.34%;"></span>
                    <span class="slider-fill" data-slider-fill="" style="width: 0px; min-width: 50.02%; left: 24.34%;"></span>
                    <span class="slider-handle" data-slider-handle="" role="slider" tabindex="0" aria-controls="3mpg17-slider" aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" aria-orientation="horizontal" style="left: 73.02%;"></span>
                    <input type="hidden" id="e48th7-slider" max="100" min="0" step="1" value="25">
                    <input type="hidden" id="3mpg17-slider" max="100" min="0" step="1" value="75">
                </div>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="sticky" class="docs-heading" data-magellan-target="sticky">Sticky<a class="docs-heading-icon" href="#sticky"></a></h2>
            <div class="docs-code-live">
                <div class="row">
                    <div class="columns small-6" id="example1" data-something="" data-mutate="zeyu3z-sticky">
                        <p id="doodle">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                            esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                            in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                            esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                            in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                            esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                            in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                            esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                            in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                    <div class="columns small-6 right sticky-container" data-sticky-container="" style="height: 248.469px;">
                        <div class="sticky is-anchored is-at-top" data-sticky="23fsk7-sticky" data-margin-top="6" data-anchor="example1" data-resize="zeyu3z-sticky" data-mutate="zeyu3z-sticky" data-events="resize" style="max-width: 408.25px; margin-top: 0px; bottom: auto; top: 0px;">
                            <img class="thumbnail" src="<?php echo $fields['hero_image']['url']; ?>">
                        </div>
                    </div>
                </div>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="switch" class="docs-heading" data-magellan-target="switch">Switch<a class="docs-heading-icon" href="#switch"></a></h2>
            <div class="docs-code-live">
                <div class="switch tiny">
                    <input class="switch-input" id="tinySwitch" type="checkbox" name="exampleSwitch">
                    <label class="switch-paddle" for="tinySwitch">
                        <span class="show-for-sr">Tiny Sandwiches Enabled</span>
                    </label>
                </div>
                <div class="switch small">
                    <input class="switch-input" id="smallSwitch" type="checkbox" name="exampleSwitch">
                    <label class="switch-paddle" for="smallSwitch">
                        <span class="show-for-sr">Small Portions Only</span>
                    </label>
                </div>
                <div class="switch large">
                    <input class="switch-input" id="largeSwitch" type="checkbox" name="exampleSwitch">
                    <label class="switch-paddle" for="largeSwitch">
                        <span class="show-for-sr">Show Large Elephants</span>
                    </label>
                </div>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="table" class="docs-heading" data-magellan-target="table">Table<a class="docs-heading-icon" href="#table"></a></h2>
            <div class="docs-code-live">
                <table>
                    <thead>
                        <tr>
                            <th width="200">Table Header</th>
                            <th>Table Header</th>
                            <th width="150">Table Header</th>
                            <th width="150">Table Header</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Content Goes Here</td>
                            <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                        </tr>
                        <tr>
                            <td>Content Goes Here</td>
                            <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                        </tr>
                        <tr>
                            <td>Content Goes Here</td>
                            <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="tabs" class="docs-heading" data-magellan-target="tabs">Tabs<a class="docs-heading-icon" href="#tabs"></a></h2>
            <div class="docs-code-live">
                <ul class="tabs" data-tabs id="example-tabs" role="tablist">
                    <li class="tabs-title is-active" role="presentation"><a href="#panel1" aria-selected="true" role="tab" aria-controls="panel1" id="panel1-label" tabindex="0">Tab 1</a></li>
                    <li class="tabs-title" role="presentation"><a href="#panel2" role="tab" aria-controls="panel2" aria-selected="false" id="panel2-label" tabindex="-1">Tab 2</a></li>
                    <li class="tabs-title" role="presentation"><a href="#panel3" role="tab" aria-controls="panel3" aria-selected="false" id="panel3-label" tabindex="-1">Tab 3</a></li>
                    <li class="tabs-title" role="presentation"><a href="#panel4" role="tab" aria-controls="panel4" aria-selected="false" id="panel4-label" tabindex="-1">Tab 4</a></li>
                    <li class="tabs-title" role="presentation"><a href="#panel5" role="tab" aria-controls="panel5" aria-selected="false" id="panel5-label" tabindex="-1">Tab 5</a></li>
                    <li class="tabs-title" role="presentation"><a href="#panel6" role="tab" aria-controls="panel6" aria-selected="false" id="panel6-label" tabindex="-1">Tab 6</a></li>
                </ul>
                <div class="tabs-content" data-tabs-content="example-tabs">
                    <div class="tabs-panel is-active" id="panel1" role="tabpanel" aria-labelledby="panel1-label">
                        <p>One</p>
                        <p>Check me out! I'm a super cool Tab panel with text content!</p>
                    </div>
                    <div class="tabs-panel" id="panel2" role="tabpanel" aria-labelledby="panel2-label" aria-hidden="true">
                        <p>Two</p>
                        <img class="thumbnail" src="<?php echo $fields['hero_image']['url']; ?>">
                    </div>
                    <div class="tabs-panel" id="panel3" role="tabpanel" aria-labelledby="panel3-label" aria-hidden="true">
                        <p>Three</p>
                        <p>Check me out! I'm a super cool Tab panel with text content!</p>
                    </div>
                    <div class="tabs-panel" id="panel4" role="tabpanel" aria-labelledby="panel4-label" aria-hidden="true">
                        <p>Four</p>
                        <img class="thumbnail" src="<?php echo $fields['hero_image']['url']; ?>">
                    </div>
                    <div class="tabs-panel" id="panel5" role="tabpanel" aria-labelledby="panel5-label" aria-hidden="true">
                        <p>Five</p>
                        <p>Check me out! I'm a super cool Tab panel with text content!</p>
                    </div>
                    <div class="tabs-panel" id="panel6" role="tabpanel" aria-labelledby="panel6-label" aria-hidden="true">
                        <p>Six</p>
                        <img class="thumbnail" src="<?php echo $fields['hero_image']['url']; ?>">
                    </div>
                </div>
            </div>

            <div class="docs-code-live">
                <ul class="tabs secondary" data-tabs id="example-tabs-2" role="tablist">
                    <li class="tabs-title is-active" role="presentation"><a href="#panel1" aria-selected="true" role="tab" aria-controls="panel1" id="panel1-label" tabindex="0">Tab 1</a></li>
                    <li class="tabs-title" role="presentation"><a href="#panel2" role="tab" aria-controls="panel2" aria-selected="false" id="panel2-label" tabindex="-1">Tab 2</a></li>
                    <li class="tabs-title" role="presentation"><a href="#panel3" role="tab" aria-controls="panel3" aria-selected="false" id="panel3-label" tabindex="-1">Tab 3</a></li>
                    <li class="tabs-title" role="presentation"><a href="#panel4" role="tab" aria-controls="panel4" aria-selected="false" id="panel4-label" tabindex="-1">Tab 4</a></li>
                    <li class="tabs-title" role="presentation"><a href="#panel5" role="tab" aria-controls="panel5" aria-selected="false" id="panel5-label" tabindex="-1">Tab 5</a></li>
                    <li class="tabs-title" role="presentation"><a href="#panel6" role="tab" aria-controls="panel6" aria-selected="false" id="panel6-label" tabindex="-1">Tab 6</a></li>
                </ul>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="thumbnail" class="docs-heading" data-magellan-target="thumbnail">Thumbnail<a class="docs-heading-icon" href="#thumbnail"></a></h2>
            <div class="docs-code-live">
                <div class="grid-x grid-margin-x">
                    <div class="cell small-4">
                        <img class="thumbnail" src="<?php echo $fields['hero_image']['url']; ?>" alt="Photo of Uranus.">
                    </div>
                    <div class="cell small-4">
                        <img class="thumbnail" src="<?php echo $fields['hero_image']['url']; ?>" alt="Photo of Neptune.">
                    </div>
                    <div class="cell small-4">
                        <img class="thumbnail" src="<?php echo $fields['hero_image']['url']; ?>" alt="Photo of Pluto.">
                    </div>
                </div>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="title-bar" class="docs-heading" data-magellan-target="title-bar">Title
                Bar<a class="docs-heading-icon" href="#title-bar"></a></h2>
            <div class="docs-code-live">
                <div class="title-bar">
                    <div class="title-bar-left">
                        <button class="menu-icon" type="button"></button>
                        <span class="title-bar-title">Foundation</span>
                    </div>
                    <div class="title-bar-right">
                        <button class="menu-icon" type="button"></button>
                    </div>
                </div>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="toggler" class="docs-heading" data-magellan-target="toggler">Toggler<a class="docs-heading-icon" href="#toggler"></a></h2>
            <div class="docs-code-live">
                <p><a data-toggle="menuBar" aria-expanded="true" aria-controls="menuBar">Expand!</a></p>
                <ul class="menu" id="menuBar" data-toggler=".expanded">
                    <li><a href="#0"><i class="fi-list"></i> <span>One</span></a></li>
                    <li><a href="#0"><i class="fi-list"></i> <span>Two</span></a></li>
                    <li><a href="#0"><i class="fi-list"></i> <span>Three</span></a></li>
                    <li><a href="#0"><i class="fi-list"></i> <span>Four</span></a></li>
                </ul>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="tooltip" class="docs-heading" data-magellan-target="tooltip">Tooltip<a class="docs-heading-icon" href="#tooltip"></a></h2>
            <div class="docs-code-live">
                <p>The <span data-tooltip="0vxym5-tooltip" aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="" aria-describedby="7uai62-tooltip" data-yeti-box="7uai62-tooltip" data-toggle="7uai62-tooltip" data-resize="7uai62-tooltip" data-events="resize">scarabaeus</span> hung quite clear of any branches,
                    and, if allowed to fall, would have fallen at our feet. Legrand immediately took the scythe, and cleared
                    with it a circular space, three or four yards in diameter, just beneath the insect, and, having
                    accomplished this, ordered Jupiter to let go the string and come down from the tree.</p>
            </div>

            <hr>
        </div>

        <div class="cell">
            <h2 id="visibility-classes" class="docs-heading" data-magellan-target="visibility-classes">Visibility
                Classes<a class="docs-heading-icon" href="#visibility-classes"></a></h2>

            <div class="docs-code-live">
                <p>You are on a small screen or larger.</p>
                <p class="show-for-medium">You are on a medium screen or larger.</p>
                <p class="show-for-large">You are on a large screen or larger.</p>
                <p class="show-for-small-only">You are <em>definitely</em> on a small screen.</p>
                <p class="show-for-medium-only">You are <em>definitely</em> on a medium screen.</p>
                <p class="show-for-large-only">You are <em>definitely</em> on a large screen.</p>
                <p class="hide-for-medium">You are <em>not</em> on a medium screen or larger.</p>
                <p class="hide-for-large">You are <em>not</em> on a large screen or larger.</p>
                <p class="hide-for-small-only">You are <em>definitely not</em> on a small screen.</p>
                <p class="hide-for-medium-only">You are <em>definitely not</em> on a medium screen.</p>
                <p class="hide-for-large-only">You are <em>definitely not</em> on a large screen.</p>
                <p class="hide">Can't touch this.</p>
                <p class="invisible">Can sort of touch this.</p>
                <p class="show-for-landscape">You are in landscape orientation.</p>
                <p class="show-for-portrait">You are in portrait orientation.</p>
                <p class="show-for-sr">This text can only be read by a screen reader.</p>
                <p>There's a line of text above this one, you just can't see it.</p>
                <p aria-hidden="true">This text can be seen, but won't be read by a screen reader.</p>
                <p><a class="show-on-focus" href="#mainContent">Skip to Content</a></p>
                <header id="header" role="banner">
                </header>
                <main id="mainContent" role="main" tabindex="0">
                </main>
            </div>
        </div>
    </div>
</div>