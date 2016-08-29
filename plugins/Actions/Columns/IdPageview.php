<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\Actions\Columns;

use Piwik\Tracker\Action;
use Piwik\Tracker\Request;
use Piwik\Tracker\Visitor;
use Piwik\Piwik;
use Piwik\Plugin\Dimension\ActionDimension;

class IdPageview extends ActionDimension
{
    protected $columnName = 'idpageview';
    protected $columnType = 'CHAR(16)';

    /**
     * @param Request $request
     * @param Visitor $visitor
     * @param Action $action
     *
     * @return mixed|false
     * @api
     */
    public function onNewAction(Request $request, Visitor $visitor, Action $action)
    {
        return $request->getParam('pv_id');
    }

    public function getName()
    {
        return Piwik::translate('Actions_ColumnIdPageview');
    }

}
