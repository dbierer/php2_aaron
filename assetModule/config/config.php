<?php

$h = 'localhost';
$u = 'webUser';
$p = 'password';
$db = 'icinga2';
$con = pg_connect("host=$h dbname=$db user=$u password=$p") or die('Could not connect: ' . pg_last_error());

/*Query and execution
 *
 * $findNumber = pg_query_params($con,
    'SELECT icinga_equip.num,
        icinga_equip.sub_equip
            FROM icinga_statehistory 
            INNER JOIN icinga_equip ON
            icinga_statehistory.object_id = icinga_equip.obj_id 
            WHERE icinga_statehistory.statehistory_id = $1', array($_GET['state_id']));

$number = pg_fetch_row($findNumber);

pg_query("BEGIN") or die("Could not start transaction\n");

while ($number){

pg_query_params($con,
    'UPDATE icinga_equip SET state = $1 WHERE num = $2, array($_GET['state'] + 2, $number[0],));
};

pg_close($con);


*/



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