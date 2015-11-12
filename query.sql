CREATE VIEW RagguppaTutteLeSondeInColonna
AS
SELECT timestamp,
   MAX(CASE WHEN idsonda = 5709  THEN valore_d END) idsonda5709,
   MAX(CASE WHEN idsonda = 6287 THEN valore_d END) idsonda6287,
   MAX(CASE WHEN idsonda = 6288  THEN valore_d END) idsonda6288,
   MAX(CASE WHEN idsonda = 5710 THEN valore_d END) idsonda5710,
MAX(CASE WHEN idsonda = 5849 THEN valore_d END) idsonda5849,
MAX(CASE WHEN idsonda = 5850 THEN valore_d END) idsonda5850,
MAX(CASE WHEN idsonda = 6047 THEN valore_d END) idsonda6047,
MAX(CASE WHEN idsonda = 6048 THEN valore_d END) idsonda6048,
MAX(CASE WHEN idsonda = 6067 THEN valore_d END) idsonda6067,
MAX(CASE WHEN idsonda = 6068 THEN valore_d END) idsonda6068,
MAX(CASE WHEN idsonda = 6107 THEN valore_d END) idsonda6107,
MAX(CASE WHEN idsonda = 6108 THEN valore_d END) idsonda6108,
MAX(CASE WHEN idsonda = 6147 THEN valore_d END) idsonda6147,
MAX(CASE WHEN idsonda = 6148 THEN valore_d END) idsonda6148,
MAX(CASE WHEN idsonda = 6187 THEN valore_d END) idsonda6187,
MAX(CASE WHEN idsonda = 6188 THEN valore_d END) idsonda6188,
MAX(CASE WHEN idsonda = 6207 THEN valore_d END) idsonda6207,
MAX(CASE WHEN idsonda = 6208 THEN valore_d END) idsonda6208,
MAX(CASE WHEN idsonda = 6227 THEN valore_d END) idsonda6227,
MAX(CASE WHEN idsonda = 6228 THEN valore_d END) idsonda6228,
MAX(CASE WHEN idsonda = 6247 THEN valore_d END) idsonda6247,
MAX(CASE WHEN idsonda = 6248 THEN valore_d END) idsonda6248,
MAX(CASE WHEN idsonda = 6267 THEN valore_d END) idsonda6267,
MAX(CASE WHEN idsonda = 6268 THEN valore_d END) idsonda6268
   
FROM ValoriSondaPerLocazione 
GROUP BY timestamp