SELECT timestamp,idlocazione , SUM(IF(IDSonda='6287' ,VALORE_D ,0)) AS 'Temperatura' , SUM(IF(IDSonda='6288' ,VALORE_D ,0)) AS 'Umidita' ,

SUM(IF(IDSonda='6287' ,MinSogliaEstate ,0)) AS 'MinSogliaEstate_Temperatura' ,
SUM(IF(IDSonda='6287' ,MaxSogliaEstate ,0)) AS 'MaxSogliaEstate_Temperatura' ,
SUM(IF(IDSonda='6287' ,MinSogliaInverno ,0)) AS 'MinSogliaInverno_Temperatura' ,
SUM(IF(IDSonda='6287' ,MaxSogliaInverno ,0)) AS 'MaxSogliaInverno_Temperatura' ,

SUM(IF(IDSonda='6288' ,MinSogliaEstate ,0)) AS 'MinSogliaEstate_Umidita' ,
SUM(IF(IDSonda='6288' ,MaxSogliaEstate ,0)) AS 'MaxSogliaEstate_Umidita'

FROM ValoriSondaPerLocazione WHERE IDLocazione=14 GROUP BY timestamp,idlocazione;



ALTER VIEW `ValoriSondaPerLocazione`
AS SELECT
   `ValoriSonda`.`ID` AS `ID`,
   `ValoriSonda`.`TimeStamp` AS `TimeStamp`,
   `ValoriSonda`.`VALORE_D` AS `VALORE_D`,
   `Sonda`.`Descrizione` AS `DescrizioneSonda`,
   `Sonda`.`MinSogliaEstate`,
   `Sonda`.`MaxSogliaEstate`,
   `Sonda`.`MinSogliaInverno`,
   `Sonda`.`MaxSogliaInverno`,
   
   `Sonda`.`TempoMinSogliaEstate`,
   `Sonda`.`TempoMaxSogliaEstate`,
   `Sonda`.`TempoMinSogliaInverno`,
   `Sonda`.`TempoMaxSogliaInverno`,
   
   
   `TipoSonda`.`Descrizione` AS `DescrizioneTipoSonda`,
   `Locazione`.`Locazione` AS `DescrizioneLocazione`,
   `TipoSonda`.`ID` AS `IDTipoSonda`,
   `ValoriSonda`.`IDSonda` AS `IDSonda`,
   `Locazione`.`IDLocazione` AS `IDLocazione`
FROM (((`ValoriSonda` join `Sonda` on((`ValoriSonda`.`IDSonda` = `Sonda`.`IDSonda`))) join `TipoSonda` on((`Sonda`.`IDTipoSonda` = `TipoSonda`.`ID`))) join `Locazione` on((`Sonda`.`IDLocazione` = `Locazione`.`IDLocazione`)));