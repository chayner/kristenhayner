<?php

class ffShortcodeMark extends ffShortcodeObjectBasic {

    protected function _addNames() {
        $this->_addShortcodeName('mark');
    }

    protected function _setRecursive() {
        $this->_setIsRecursive( false );
    }

    protected function _printShortcode($atts = array(), $content = '', $currentShortcodeName = '') {
        echo '<mark>'.$content.'</mark>';
    }
}