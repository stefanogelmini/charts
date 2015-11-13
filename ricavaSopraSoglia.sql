
SET @SOGLIA_VALORE:=25.8;
SET @SOGLIA_TEMPO:=15;


 
select t1.`idsonda`, t1.`timestamp`, t1.`VALORE_D`
from ValoriSonda t1
inner join ValoriSonda t2
on t2.id = (t1.id + 1)
where  t1.IDSonda=5709 AND TIMESTAMPDIFF(MINUTE,t1.timestamp,t2.timestamp) >= @SOGLIA_TEMPO
and t1.VALORE_D >= @SOGLIA_VALORE 