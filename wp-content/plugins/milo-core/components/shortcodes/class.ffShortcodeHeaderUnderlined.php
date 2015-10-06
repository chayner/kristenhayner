<?php

class ffShortcodeHeaderUnderlined extends ffShortcodeObjectBasic {

    protected function _addNames() {
        $this->_addShortcodeName('header-underlined');
        $this->_addShortcodeName('header_underlined');
        $this->_addShortcodeName('heading-underlined');
        $this->_addShortcodeName('heading_underlined');
        $this->_addShortcodeName('underlined-header');
        $this->_addShortcodeName('underlined_header');

        $this->_addDefaultArgument('id', '');
    }

    protected function _setRecursive() {
        $this->_setIsRecursive( false );
    }

    protected function _printShortcode($atts = array(), $content = '', $currentShortcodeName = '') {
        echo '<header id="'.$this->_getArgument('id').'" class="content-header v2">';
            echo '<h3>';
                echo $content;
            echo '</h3>';
        echo '</header>';
    }
}