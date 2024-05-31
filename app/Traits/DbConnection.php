<?php
namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait DbConnection
{
    public function setModelConnection($dist_code)
    {
        $connection = $this->dbConfig($dist_code);
        $this->setConnection($connection->getName());
    }

    public function dbConfig($dist_code, $load_default = false)
    {
        $db_name = $this->getDbName($dist_code);
        DB::purge($db_name);

        $db_config = config('database.connections.pgsql');

        $db_server = $this->getDbServer($db_name);

        $db_config['database'] = $db_name;
        $db_config['port'] = $db_server['port'];
        $db_config['host'] = $db_server['host'];
        $db_config['username'] = $db_server['username'];
        $db_config['password'] = $db_server['password'];

        config(['database.connections.' . $db_name => $db_config]);

        if ($load_default == true) {
            DB::setDefaultConnection($db_name);
        } else {
            return DB::connection($db_name);
        }
    }

    protected function getDbServer($db_name)
    {
        $db_server = config('database_servers');

        foreach ($db_server as $conf) {
            if (in_array($db_name, $conf['database'])) {
                return $conf;
            }
        }
    }

    protected function getDbName($dist_code)
    {
        switch (trim($dist_code)) {
            case '06':
            case '33':
            case '02':
            case '05':
            case '24':
            case '27':
            case '12':
            case '16':
            case '18':
            case '34':
            case '37':
            case '11':
            case '25':
            case '35':
            case '03':
            case '14':
            case '13':
            case '08':
            case '36':
            case '32':
            case '39':
            case '15':
            case '21':
            case '01':
            case '10':
            case '22':
            case '23':
            case '38':
                return 'test';

            case '17':
                return 'dibrugarh';

            case '07':
                return 'kamrup_uat';

            default:
                return 'default_value';
        }
    }
}
