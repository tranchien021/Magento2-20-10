<?php

namespace Training\ComputerGame\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;

class Actions extends Column
{
    const NAME = 'actions';

    /**
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['game_id'])) {
                    $item[$this->getData('name')] = [
                        'delete' => [],
                        'view' => [
                            'href' => $this->getContext()->getUrl(
                                'computergame/create/view',
                                ['game_id' => $item['game_id']]
                            ),
                            'label' => __('View'),
                        ],
                    ];
                }
            }
        }

        return $dataSource;
    }
}
