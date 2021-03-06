<?php

namespace Propeller\Models;

use Propel\Generator\Model\Behavior;

class BehaviorModel extends Behavior
{
    /**
     * Generate query attributes.
     *
     * @return string
     */
    public function queryAttributes()
    {
        //save the funny syntax
        return implode(' ', [
            $this->setQueryAttributesPropellerTableCreate(),
            $this->setQueryAttributesPropellerTableRead(),
            $this->setQueryAttributesPropellerTableUpdate(),
            $this->setQueryAttributesPropellerTableDelete(),
            $this->setQueryAttributesPropellerTableOrder(),
            $this->setQueryAttributesPropellerTableColumnShow(),
            $this->setQueryAttributesPropellerRowColumnAttributes(),
        ]).'
 ';
    }

    /**
     * Generator method to allow to create a row.
     *
     * @return string
     */
    private function setQueryAttributesPropellerTableCreate()
    {
        return '
/**
 * Allow to create a row.
 *
 * @var bool
 */
private $propellerTableCreate = true;
';
    }

    /**
     * Generator method to allow to read the row.
     *
     * @return string
     */
    private function setQueryAttributesPropellerTableRead()
    {
        return '
/**
 * Allow to read the row.
 *
 * @var bool
 */
private $propellerTableRead = true;
';
    }

    /**
     * Generator method to allow to update the row.
     *
     * @return string
     */
    private function setQueryAttributesPropellerTableUpdate()
    {
        return '
/**
 * Allow to update the row.
 *
 * @var bool
 */
private $propellerTableUpdate = true;
';
    }

    /**
     * Generator method to allow to delete the row.
     *
     * @return string
     */
    private function setQueryAttributesPropellerTableDelete()
    {
        return '
/**
 * Allow to delete the row.
 *
 * @var bool
 */
private $propellerTableDelete = true;
';
    }

    /**
     * Generator method to order rows according to columns and directions.
     *
     * @return string
     */
    private function setQueryAttributesPropellerTableOrder()
    {
        return '
/**
 * Order rows according to columns and directions.
 *
 * @var array
 */
private $propellerTableOrder = [];
';
    }

    /**
     * Generator method to show columns.
     *
     * @return string
     */
    private function setQueryAttributesPropellerTableColumnShow()
    {
        $data = [];

        $columns = $this->getTable()->getColumns();

        foreach ($columns as $column) {
            //initally show only primary keys
            if ($column->isPrimaryKey()) {
                $data[] = '\''.$column->getName().'\' => true';
            }
        }

        return '
/**
 * Show columns.
 *
 * @var array
 */
private $propellerTableColumnShow = ['.implode(',', $data).'];
';
    }

    /**
     * Generator method to set row column attributes.
     *
     * @return string
     */
    private function setQueryAttributesPropellerRowColumnAttributes()
    {
        $data = [];

        $columns = $this->getTable()->getColumns();

        foreach ($columns as $column) {
            //initally set dissabled attribute to autoincrement columns
            if ($column->isAutoIncrement()) {
                $data[] = '\''.$column->getName().'\' => [\'disabled\' => \'disabled\']';
            }
        }

        return '
/**
 * Set row column attributes.
 *
 * @var array
 */
private $propellerRowColumnAttributes = ['.implode(',', $data).'];
';
    }

    /**
     * Generate query methods.
     *
     * @return string
     */
    public function queryMethods()
    {
        //save the funny syntax
        return implode(' ', [
            $this->setQueryMethodsSetPropellerTableCreate(),
            $this->setQueryMethodsGetPropellerTableCreate(),
            $this->setQueryMethodsSetPropellerTableRead(),
            $this->setQueryMethodsGetPropellerTableRead(),
            $this->setQueryMethodsSetPropellerTableUpdate(),
            $this->setQueryMethodsGetPropellerTableUpdate(),
            $this->setQueryMethodsSetPropellerTableDelete(),
            $this->setQueryMethodsGetPropellerTableDelete(),
            $this->setQueryMethodsSetPropellerTableOrder(),
            $this->setQueryMethodsGetPropellerTableOrder(),
            $this->setQueryMethodsSetPropellerTableColumnShow(),
            $this->setQueryMethodsGetPropellerTableColumnShow(),
            $this->setQueryMethodsSetPropellerRowColumnAttributes(),
            $this->setQueryMethodsGetPropellerRowColumnAttributes(),
        ]).'
 ';
    }

    /**
     * Generator method to set the row creating boolean.
     *
     * @return string
     */
    private function setQueryMethodsSetPropellerTableCreate()
    {
        return '
/**
 * Set the boolean to allow to create a row.
 *
 * @param bool $key
 *
 * @return void
 */
public function setPropellerTableCreate($key = true)
{
    $this->propellerTableCreate = $key;
}
';
    }

    /**
     * Generator method to get the row creating boolean.
     *
     * @return string
     */
    private function setQueryMethodsGetPropellerTableCreate()
    {
        return '
/**
 * Get the boolean to allow to create a row.
 *
 * @return bool
 */
public function getPropellerTableCreate()
{
    return $this->propellerTableCreate;
}
';
    }

    /**
     * Generator method to set the row reading boolean.
     *
     * @return string
     */
    private function setQueryMethodsSetPropellerTableRead()
    {
        return '
/**
 * Set the boolean to allow to read the row.
 *
 * @param bool $key
 *
 * @return void
 */
public function setPropellerTableRead($key = true)
{
    $this->propellerTableRead = $key;
}
';
    }

    /**
     * Generator method to get the row reading boolean.
     *
     * @return string
     */
    private function setQueryMethodsGetPropellerTableRead()
    {
        return '
/**
 * Get the boolean to allow to read a new row.
 *
 * @return bool
 */
public function getPropellerTableRead()
{
    return $this->propellerTableRead;
}
';
    }

    /**
     * Generator method to set the row updating boolean.
     *
     * @return string
     */
    private function setQueryMethodsSetPropellerTableUpdate()
    {
        return '
/**
 * Set the boolean to allow to update the row.
 *
 * @param bool $key
 *
 * @return void
 */
public function setPropellerTableUpdate($key = true)
{
    $this->propellerTableUpdate = $key;
}
';
    }

    /**
     * Generator method to get the row updating boolean.
     *
     * @return string
     */
    private function setQueryMethodsGetPropellerTableUpdate()
    {
        return '
/**
 * Get the boolean to allow to update a new row.
 *
 * @return bool
 */
public function getPropellerTableUpdate()
{
    return $this->propellerTableUpdate;
}
';
    }

    /**
     * Generator method to set the row deleting boolean.
     *
     * @return string
     */
    private function setQueryMethodsSetPropellerTableDelete()
    {
        return '
/**
 * Set the boolean to allow to delete a new row.
 *
 * @param bool $key
 *
 * @return void
 */
public function setPropellerTableDelete($key = true)
{
    $this->propellerTableDelete = $key;
}
';
    }

    /**
     * Generator method to get the row deleting boolean.
     *
     * @return string
     */
    private function setQueryMethodsGetPropellerTableDelete()
    {
        return '
/**
 * Get the boolean to allow to delete a new row.
 *
 * @return bool
 */
public function getPropellerTableDelete()
{
    return $this->propellerTableDelete;
}
';
    }

    /**
     * Generator method to set the order of rows.
     *
     * @return string
     */
    private function setQueryMethodsSetPropellerTableOrder()
    {
        return '
/**
 * Set the order of rows according to the column and the direction.
 *
 * @param string $key The column.
 * @param string $value The value.
 *
 * @return void
 */
public function setPropellerTableOrder($key, $value)
{
    $this->propellerTableOrder[$key] = $value;
}
';
    }

    /**
     * Generator method to get the order of rows.
     *
     * @return string
     */
    private function setQueryMethodsGetPropellerTableOrder()
    {
        return '
/**
 * Get the order of rows according to the column and the direction.
 *
 * @param string $key The column.
 *
 * @return string
 */
public function getPropellerTableOrder($key)
{
    return isset($this->propellerTableOrder[$key]) ? $this->propellerTableOrder[$key] : null;
}
';
    }

    /**
     * Generator method to set the visibility of the column.
     *
     * @return string
     */
    private function setQueryMethodsSetPropellerTableColumnShow()
    {
        return '
/**
 * Set the visibility of the column.
 *
 * @param string $key The column.
 * @param bool $value The value.
 *
 * @return void
 */
public function setPropellerTableColumnShow($key, $value = true)
{
    $this->propellerTableColumnShow[$key] = $value;
}
';
    }

    /**
     * Generator method to get the visibility of the column.
     *
     * @return string
     */
    private function setQueryMethodsGetPropellerTableColumnShow()
    {
        return '
/**
 * Get the visibility of the column.
 *
 * @param string $key The column.
 *
 * @return bool
 */
public function getPropellerTableColumnShow($key)
{
    return isset($this->propellerTableColumnShow[$key]) ? $this->propellerTableColumnShow[$key] : null;
}
';
    }

    /**
     * Generator method to set row column attributes.
     *
     * @return string
     */
    private function setQueryMethodsSetPropellerRowColumnAttributes()
    {
        return '
/**
 * Set row column attributes.
 *
 * @param string $key The column.
 * @param string $attribute The attribute.
 * @param string $value The value.
 *
 * @return void
 */
public function setPropellerRowColumnAttributes($key, $attribute, $value = \'\')
{
    $this->propellerRowColumnAttributes[$key][$attribute] = $value;
}
';
    }

    /**
     * Generator method to get row column attributes.
     *
     * @return string
     */
    private function setQueryMethodsGetPropellerRowColumnAttributes()
    {
        return '
/**
 * Get row column attributes.
 *
 * @param string $key The column.
 *
 * @return array
 */
public function getPropellerRowColumnAttributes($key)
{
    return isset($this->propellerRowColumnAttributes[$key]) ? $this->propellerRowColumnAttributes[$key] : null;
}
';
    }
}
