<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link    http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\CustomPiwikJs;

use Piwik\Log;
use Piwik\Plugin;

class CustomPiwikJs extends Plugin
{
    public function getListHooksRegistered()
    {
        return array(
            'CoreUpdater.update.end' => 'updateTracker',
            'PluginManager.pluginDeactivated' => 'updateTracker',
            'PluginManager.pluginActivated' => 'updateTracker',
            'CronArchive.end' => 'updateTracker',
        );
    }

    public function updateTracker()
    {
        try {
            $trackerUpdater = new TrackerUpdater();
            $trackerUpdater->update();
        } catch (\Exception $e) {
            Log::error('There was an error while updating the javascript tracker: ' . $e->getMessage());
        }
    }
}
