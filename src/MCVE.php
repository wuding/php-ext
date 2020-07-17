<?php
namespace Ext;

class MCVE
{
    public function getHeader($conn = null, $identifier = null, $column_num = null)
    {
        return m_getheader($conn, $identifier, $column_num);
    }
}