<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\Feedback;
use Piwik\Menu\MenuTop;
use Piwik\Piwik;


/**
 *
 */
class Feedback extends \Piwik\Plugin
{

    /**
     * @see Piwik\Plugin::getListHooksRegistered
     */
    public function getListHooksRegistered()
    {
        return array(
            'AssetManager.getStylesheetFiles'        => 'getStylesheetFiles',
            'AssetManager.getJavaScriptFiles'        => 'getJsFiles',
            'Menu.Top.addItems'                      => 'addTopMenu',
            'Translate.getClientSideTranslationKeys' => 'getClientSideTranslationKeys'
        );
    }

    public function addTopMenu()
    {
        MenuTop::addEntry(
            'General_GiveUsYourFeedback',
            array('module' => 'Feedback', 'action' => 'index', 'segment' => false),
            true,
            $order = 20,
            $isHTML = false,
            $tooltip = Piwik::translate('Feedback_TopLinkTooltip')
        );
    }

    public function getStylesheetFiles(&$stylesheets)
    {
        $stylesheets[] = "plugins/Feedback/stylesheets/feedback.less";

        $stylesheets[] = "plugins/Feedback/angularjs/ratefeature/ratefeature.less";
    }

    public function getJsFiles(&$jsFiles)
    {
        $jsFiles[] = "plugins/Feedback/javascripts/feedback.js";

        $jsFiles[] = "plugins/Feedback/angularjs/ratefeature/ratefeature-model.js";
        $jsFiles[] = "plugins/Feedback/angularjs/ratefeature/ratefeature-controller.js";
        $jsFiles[] = "plugins/Feedback/angularjs/ratefeature/ratefeature-directive.js";
    }

    public function getClientSideTranslationKeys(&$translationKeys)
    {
        $translationKeys[] = 'General_Loading';
        $translationKeys[] = 'Feedback_ThankYou';
        $translationKeys[] = 'Feedback_RateFeatureTitle';
        $translationKeys[] = 'Feedback_RateFeatureThankYouTitle';
        $translationKeys[] = 'Feedback_RateFeatureLeaveMessageLike';
        $translationKeys[] = 'Feedback_RateFeatureLeaveMessageDislike';
        $translationKeys[] = 'Feedback_SendFeedback';
    }
}
