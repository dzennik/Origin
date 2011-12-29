/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 26.12.11
 * Time: 21:43
 * To change this template use File | Settings | File Templates.
 */

Ext.define('Origin.model.Collection', {
    extend: 'Ext.data.Model',
    fields: [
        {name: 'text',     type: 'string'},
        {name: 'value',    type: 'string'}
    ]
});