<?php

namespace Angeldm\Cockpit\Model\Config\Source;

class Tabs implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
          ['value' => 'system', 'label' => __('System'),'url' => 'system/index.html'],
          ['value' => 'logs', 'label' => __('Logs'),'url' => 'system/logs.html'],
          ['value' => 'storage', 'label' => __('Storace'),'url' => 'system'],
          ['value' => 'services', 'label' => __('Services'),'url' => 'system'],
          ['value' => 'selinux', 'label' => __('Selinux'),'url' => 'system'],
          ['value' => 'updates', 'label' => __('Updates'),'url' => 'system'],
          ['value' => 'terminal', 'label' => __('Terminal'),'url' => 'system/terminal.html'],
        ];
    }

    public function toArray()
    {
        return [
          'system' => __('system'),
          'logs' => __('logs'),
          'storage' => __('storage'),
          'services' => __('service'),
          'selinux' => __('selinux'),
          'updates' => __('updates'),
          'terminal' => __('terminal')];
    }

    public function toArrayLabel()
    {
        return [
          'system' => 'System',
          'logs' => 'Logs',
          'storage' => 'Storage',
          'services' => 'Services',
          'selinux' => 'Selinux',
          'updates' => 'Updates',
          'terminal' => 'Terminal'];
    }

    public function toArrayUrl()
    {
        return [
          'system' => 'system/index.html',
          'logs' => 'system/logs.html',
          'storage' => 'storage/index.html',
          'services' => 'system/services.html',
          'selinux' => 'selinux/setroubleshoot.html',
          'updates' => 'updates/index.html',
          'terminal' => 'system/terminal.html'
        ];
    }

    public function arrayFillKeys($valueArray)
    {
        $keyArray = $this->toArrayUrl();
        $labelArray = $this->toArrayLabel();
        foreach ($valueArray as $key) {
            $offerArray[$key] = ['url'=>$keyArray[$key],'label'=>$labelArray[$key]];
        }
        return $offerArray;
    }
}
