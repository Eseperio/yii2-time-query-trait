<?php

namespace eseperio\time\traits;

use eseperio\time\dictionaries\TimeDataTypes;

/**
 * Trait TimeFiltersQueryTrait
 * @package eseperio\time\traits
 * @see \yii\db\ActiveQuery
 *
 */
trait TimeFiltersQueryTrait
{
    /**
     * @var string The attribute name for the beginning date in the model.
     * You can change this value to match the actual attribute name in your model.
     * By default, it is set to "begin_date".
     */
    public $timeUtilsBeginDateAttribute = "begin_date";

    /**
     * @var string The attribute name for the ending date in the model.
     * You can change this value to match the actual attribute name in your model.
     * By default, it is set to "end_date".
     */
    public $timeUtilsEndDateAttribute = "end_date";



    /**
     * Filters models to those overlapping with given dates.
     *
     * This method applies date overlap filtering to the active query, narrowing down the result set to models whose date ranges overlap with the provided dates. The method supports both inclusive and exclusive overlap checks.
     *
     * Examples:
     *
     * To filter models that overlap with a specific date range:
     * ```php
     * $begin = strtotime('2023-01-01'); // Beginning date: January 1, 2023
     * $end = strtotime('2023-12-31'); // Ending date: December 31, 2023
     * $query->overlapsWith($begin, $end);
     * ```
     *
     * To filter models that are completely included within a date range:
     * ```php
     * $begin = strtotime('2023-01-01'); // Beginning date: January 1, 2023
     * $end = strtotime('2023-12-31'); // Ending date: December 31, 2023
     * $query->overlapsWith($begin, $end, true);
     * ```
     *
     * To filter models that overlap with a specific point in time (single date):
     * ```php
     * $begin = strtotime('2023-06-01'); // June 1, 2023
     * $query->overlapsWith($begin, $begin);
     * ```
     * @param int|null $begin The beginning date/time in Unix timestamp format. If null, the filter will not consider the beginning date.
     * @param int|null $end The ending date/time in Unix timestamp format. If null, the filter will not consider the ending date.
     * @param bool $onlyInside Indicates whether to filter only models with complete inclusion inside the provided date range. If set to true, only models with both the beginning and ending dates falling within the range will be returned.
     * @return \yii\db\ActiveQuery|\eseperio\time\traits\TimeFiltersQueryTrait The query object with the applied overlap filter.
     *
     */
    public function overlapsWith(?int $begin, ?int $end, bool $onlyInside = false)
    {
        $mainAlias = $this->getPrimaryTableName();

        $beginDate = "$mainAlias." . $this->timeUtilsBeginDateAttribute;
        $endDate = "$mainAlias." . $this->timeUtilsEndDateAttribute;

        if ($begin !== null && $end !== null) {
            if ($onlyInside) {
                $this->andWhere(['between', $beginDate, $begin, $end]);
                $this->andWhere(['between', $endDate, $begin, $end]);
            } else {
                $this->andWhere(['or',
                    ['between', $beginDate, $begin, $end],
                    ['between', $endDate, $begin, $end],
                    ['and',
                        ['<=', $beginDate, $begin],
                        ['>=', $endDate, $end]
                    ]
                ]);
            }
        } elseif ($begin !== null) {
            if ($onlyInside) {
                $this->andWhere(['<=', $beginDate, $begin]);
                $this->andWhere(['>=', $endDate, $begin]);
            } else {
                $this->andWhere(['or',
                    ['>=', $beginDate, $begin],
                    ['<=', $endDate, $begin]
                ]);
            }
        } elseif ($end !== null) {
            if ($onlyInside) {
                $this->andWhere(['>=', $endDate, $end]);
                $this->andWhere(['<=', $beginDate, $end]);
            } else {
                $this->andWhere(['or',
                    ['<=', $beginDate, $end],
                    ['>=', $endDate, $end]
                ]);
            }
        }

        return $this;
    }

}
