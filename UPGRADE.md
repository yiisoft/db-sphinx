# Upgrading Instructions for Yii Framework v2 Sphinx Extension

This file contains the upgrade notes. These notes highlight changes that could break your
application when you upgrade the package from one version to another.

> **Important!** The following upgrading instructions are cumulative. That is, if you want
> to upgrade from version A to version C and there is version B between A and C, you need
> to following the instructions for both A and B.

## Upgrade from Yii 2.0.5

- The signature of the `\Yiisoft\Db\Sphinx\QueryBuilder::buildGroupBy()` method has been changed.
  Make sure you invoke this method correctly. In case you are extending related class and override this method,
  you should check, if it matches parent declaration.
