<?php
/**
 * Magento Messages Block (bootstrap)
 *
 * @author    Dan Gibbs <dan@goldcoastmedia.co.uk>
 * @copyright Copyright (C) 2014 Gold Coast Media Ltd
 */

class GoldCoastMedia_BootstrapAlerts_Block_Messages extends
    Mage_Core_Block_Messages
{
    /**
     * Retrieve messages in HTML format grouped by type
     *
     * @param   string $type
     * @return  string
     */
    public function getGroupedHtml()
    {
        if( !Mage::getStoreConfig('bootstrapalerts/general/active') )
            return parent::getGroupedHtml();

        if( Mage::app()->getStore()->isAdmin() )
            return parent::getGroupedHtml();
        
        $version = Mage::getStoreConfig(
            'bootstrapalerts/general/bootstrap_version'
        );

        if($version == 3)
            return $this->getGroupedHtmlBootstrap3();

        if($version == 2)
            return $this->getGroupedHtmlBootstrap2();
    }

    /**
     *
     */
    public function getGroupedHtmlBootstrap2()
    {
        $types = array(
            Mage_Core_Model_Message::ERROR,
            Mage_Core_Model_Message::WARNING,
            Mage_Core_Model_Message::NOTICE,
            Mage_Core_Model_Message::SUCCESS
        );

        $bootstrap_alerts = array(
            Mage_Core_Model_Message::ERROR   => 'alert alert-error',
            Mage_Core_Model_Message::WARNING => 'alert',
            Mage_Core_Model_Message::NOTICE  => 'alert alert-info',
            Mage_Core_Model_Message::SUCCESS => 'alert alert-success',
        );

        $html = '';

        foreach($types as $type) {

            if( $messages = $this->getMessages($type) ) {
                $html .= '<div class="alert alert-' . $bootstrap_alerts[$type] . '">';

                foreach ( $messages as $message ) {
                   
                    $html .= ($this->_escapeMessageFlag) ? $this->escapeHtml(
                        $message->getText()) : $message->getText();
                }

                $html .= '</div>';

            }
        }

        return $html;
    }

    /**
     *
     */
    public function getGroupedHtmlBootstrap3()
    {
        $types = array(
            Mage_Core_Model_Message::ERROR,
            Mage_Core_Model_Message::WARNING,
            Mage_Core_Model_Message::NOTICE,
            Mage_Core_Model_Message::SUCCESS
        );

        $bootstrap_alerts = array(
            Mage_Core_Model_Message::ERROR   => 'alert alert-danger',
            Mage_Core_Model_Message::WARNING => 'alert alert-warning',
            Mage_Core_Model_Message::NOTICE  => 'alert alert-info',
            Mage_Core_Model_Message::SUCCESS => 'alert alert-success',
        );

        $html = '';

        foreach($types as $type) {

            if( $messages = $this->getMessages($type) ) {
                $html .= '<div class="alert alert-' . $bootstrap_alerts[$type] . '">';

                foreach ( $messages as $message ) {
                   
                    $html.= ($this->_escapeMessageFlag) ? $this->escapeHtml(
                        $message->getText()) : $message->getText();
                }

                $html .= '</div>';

            }
        }

        return $html;
    }
}
