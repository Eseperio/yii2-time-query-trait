## TimeActiveQuery

`TimeActiveQuery` extends the `yii\db\ActiveQuery` class and includes the `TimeFiltersQueryTrait`. It provides convenient access to time filtering utilities for models.

To use the time filtering functionalities in your models, simply make your ActiveQuery classes inherit from `TimeActiveQuery` instead of `yii\db\ActiveQuery`.

### Usage

1. Import the `TimeActiveQuery` class in your ActiveQuery class file:

   ```php
   use eseperio\time\db\TimeActiveQuery;
   ```

2. Make your ActiveQuery class inherit from `TimeActiveQuery`:

   ```php
   class MyQuery extends TimeActiveQuery
   {
       // Your custom query code here
   }
   ```

3. Now you can use the time filtering methods provided by the `TimeFiltersQueryTrait` in your custom query.

