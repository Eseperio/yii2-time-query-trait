<?php

namespace eseperio\time\db;

use eseperio\time\traits\TimeFiltersQueryTrait;

/**
 * TimeActiveQuery extends the yii\db\ActiveQuery class and includes the TimeFiltersQueryTrait.
 * This class provides convenient access to the time filtering utilities for models.
 *
 * To use the time filtering functionalities in your models, simply make your ActiveQuery classes
 * inherit from TimeActiveQuery instead of yii\db\ActiveQuery.
 *
 * For example:
 * ```php
 * use eseperio\time\db\TimeActiveQuery;
 *
 * class MyQuery extends TimeActiveQuery
 * {
 *     // Your custom query code here
 * }
 * ```
 *
 * Now you can use the time filtering methods provided by the TimeFiltersQueryTrait in your custom query.
 */
class TimeActiveQuery extends \yii\db\ActiveQuery
{
    use TimeFiltersQueryTrait;
}
