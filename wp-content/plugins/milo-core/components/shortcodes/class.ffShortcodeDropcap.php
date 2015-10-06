<?php

class ffShortcodeDropcap extends ffShortcodeObjectBasic {

    protected function _addNames() {
        $this->_addShortcodeName('dropcap');
    }

    protected function _setRecursive() {
        $this->_setIsRecursive( false );
    }

    protected function _printShortcode($atts = array(), $content = '', $currentShortcodeName = '') {
        echo '<span class="dropcap">'.$content.'</span>';
    }
}