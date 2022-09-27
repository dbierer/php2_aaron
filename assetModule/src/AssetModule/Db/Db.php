<?php
namespace AssetModule\Db;

use PDO;
use Exception;
use Throwable;

class Db
{
	public const ERR_DB = 'ERROR: unable to connect to the database';
	public PDO $pdo = NULL;
	public array $config = [];
	public function __construct(array $config)
	{
		['dsn' => $dsn, 'usr' => $usr, 'pwd' => $pwd, 'opts' => $opts] = $config['db'];
		// alternatively
		/*
		 $dsn = $config['db']['dsn'] ?? self::DSN;
		 $usr = $config['db']['usr'];
		 $pwd = $config['db']['pwd'];
		 $opts = $config['db']['opts'] ?? [];
		 */
		try {
			$this->pdo = new PDO($dsn, $usr, $pwd, $opts);
		} catch (Throwable $t) {
			error_log(__METHOD__ . ':' . $t->getMessage() . ':' . $t->getTraceAsString());
			throw new Exception(self::ERR_DB);
		}
	}
	public function findNumber(string $id) : array
	{
		try {
			$sql = 'SELECT icinga_equip.num,icinga_equip.sub_equip '
				 . 'FROM icinga_statehistory '
				 . 'INNER JOIN icinga_equip '
				 . 'ON icinga_statehistory.object_id = icinga_equip.obj_id '
				 . 'WHERE icinga_statehistory.statehistory_id = ?';
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute([$id]);
			return $stmt->fetch(PDO::FETCH_ASSOC);
		} catch (Throwable $t) {
			error_log(__METHOD__ . ':' . $t->getMessage() . ':' . $t->getTraceAsString());
			return [];
		}
	}
	/**
	 * Updates equipment
	 * 
	 * @param string $state : state code
	 * @param int $num      : ???
	 * @return int $rows    : number of rows affected; if === 0 that means failure
	 */
	public function updateEquip(string $state, int $num) : int
	{
		try {
			$this->pdo->beginTransaction();
			$sql = 'UPDATE icinga_equip SET state = :state WHERE num = :num';
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute(['state' => $state, 'num' => $num]);
			$rows = $stmt->rowCount();
			$this->pdo->commit();
		} catch (Throwable $t) {
			error_log(__METHOD__ . ':' . $t->getMessage() . ':' . $t->getTraceAsString());
			$rows = 0;
			$this->pdo->rollback();
		}
		return $rows;
	}
}

/*Stored Function*/
/*
create function f_next_shift_start(arg1 bigint) returns bigint
    language plpgsql
as
$$
begin
    return f_prior_shift_end(arg1) + 43201000;
end;
$$;

alter function f_next_shift_start(bigint) owner to db_owner;

grant execute on function f_next_shift_start(bigint) to function_executor;
*/
