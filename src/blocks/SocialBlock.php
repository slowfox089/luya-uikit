<?php

namespace trk\uikit\blocks;

use trk\uikit\BaseUikitBlock;
use trk\uikit\Module;
use trk\uikit\blockgroups\NavigationGroup;

/**
 * Social Block.
 *
 * @author Iskender TOTOĞLU <iskender@altivebir.com>
 */
final class SocialBlock extends BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    public $component = "social";

    /**
     * @inheritdoc
     */
    public function blockGroup()
    {
        return NavigationGroup::class;
    }

    /**
     * @inheritdoc
     */
    public function name()
    {
        return Module::t('social');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'share';
    }

    /**
     * @inheritdoc
     */
    public function frontend(array $params = array())
    {
        if(count($this->getVarValue('items', []))) {
            return parent::frontend($params);
        } else {
            return "";
        }
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        if($output = $this->frontend()) {
            return $output;
        } else {
            return '<div><span class="block__empty-text">' . Module::t('no_content') . '</span></div>';
        }
    }
}
