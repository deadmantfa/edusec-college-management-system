<?php
class DBConnection{
	function getConnection(){
        $config = Yii::app()->db->connectionString;
        $dbname = '';
        $host   = '';

        $conn_arr = explode( ':', $config  );

        // it only works with mysql so let's check for it
        if( $conn_arr[0] == 'mysql' )
        {
            // let's get the attributes
            $conn_attr = explode( ';', $conn_arr[1] );

            for( $i=0; $i<sizeof( $conn_attr ); $i++ )
            {
                // find the host
                if( stristr( $conn_attr[$i], 'host=' ) )
                {
                    $host = str_ireplace( 'host=', '', $conn_attr[$i] );
                }

                // find the dbname
                if( stristr( $conn_attr[$i], 'dbname=' ) )
                {
                    $dbname = str_ireplace( 'dbname=', '', $conn_attr[$i] );
                }
            }
        }

		mysql_connect( $host, Yii::app()->db->username,Yii::app()->db->password) or die("Could not connect: " . mysql_error());
        mysql_select_db( $dbname ) or die("Could not select database: " . mysql_error());
	}
}
?>
