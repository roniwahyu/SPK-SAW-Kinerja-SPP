-- SQL UNTUK MATRIX PROFILE MATCHING
select `a`.`id_nilai` AS `id_nilai`,`a`.`id_pimpinan` AS `id_pimpinan`,`a`.`kode` AS `kode`,`a`.`nama_pimpinan` AS `nama_pimpinan`,`a`.`jabatan` AS `jabatan`,`a`.`C1` AS `C1`,`a`.`C2` AS `C2`,`a`.`C3` AS `C3`,
if((`a`.`C1` between 0 and 20),1,if((`a`.`C1` between 21 and 59),2,if((`a`.`C1` between 60 and 70),3,if((`a`.`C1` between 71 and 80),4,5)))) AS `a`,
if((`a`.`C2` between 0 and 20),1,if((`a`.`C2` between 21 and 59),2,if((`a`.`C2` between 60 and 70),3,if((`a`.`C2` between 71 and 80),4,5)))) AS `b`,
if((`a`.`C3` between 0 and 20),1,if((`a`.`C3` between 21 and 59),2,if((`a`.`C3` between 60 and 70),3,if((`a`.`C3` between 71 and 80),4,5)))) AS `c`,
if((`a`.`C4` between 0 and 20),1,if((`a`.`C4` between 21 and 59),2,if((`a`.`C4` between 60 and 70),3,if((`a`.`C4` between 71 and 80),4,5)))) AS `d`,
if((`a`.`C5` between 0 and 20),1,if((`a`.`C5` between 21 and 59),2,if((`a`.`C5` between 60 and 70),3,if((`a`.`C5` between 71 and 80),4,5)))) AS `e`,
if((`a`.`C6` between 0 and 20),1,if((`a`.`C6` between 21 and 59),2,if((`a`.`C6` between 60 and 70),3,if((`a`.`C6` between 71 and 80),4,5)))) AS `f`,
if((`a`.`C7` between 0 and 20),1,if((`a`.`C7` between 21 and 59),2,if((`a`.`C7` between 60 and 70),3,if((`a`.`C7` between 71 and 80),4,5)))) AS `g` 
from `04-0-view-matriks-profile-matching` `a`

-- WEIGHTED MATRIX
select `a`.`id_nilai` AS `id_nilai`,`a`.`id_pimpinan` AS `id_pimpinan`,`a`.`kode` AS `kode`,`a`.`nama_pimpinan` AS `nama_pimpinan`,`a`.`jabatan` AS `jabatan`,`a`.`C1` AS `C1`,`a`.`C2` AS `C2`,`a`.`C3` AS `C3`,`a`.`a` AS `a`,`a`.`b` AS `b`,`a`.`c` AS `c`,`b`.`a_fasilitas` AS `a_fasilitas`,`b`.`b_gaji` AS `b_gaji`,`b`.`c_bbm` AS `c_bbm`,(`a`.`a` - `b`.`a_fasilitas`) AS `weight_a`,
(`a`.`b` - `b`.`b_gaji`) AS `weight_b`,
(`a`.`c` - `b`.`c_bbm`) AS `weight_c`,
(`a`.`d` - `b`.`d`) AS `weight_d`,
(`a`.`e` - `b`.`e`) AS `weight_e`,
(`a`.`f` - `b`.`f`) AS `weight_f`,
(`a`.`g` - `b`.`g`) AS `weight_g`,
from (`04-1-view-promatch-gap` `a` join `gap_pm` `b`)


---- NILAI PERKRITERIA
SELECT
	`a`.`id_nilai` AS `id_nilai`,
	`a`.`id_pimpinan` AS `id_pimpinan`,
	`a`.`C4` AS `C4`,
	`a`.`d` AS `d`,
	`a`.`d_jmhs` AS `d_jmhs`,
	`a`.`weight_d` AS `weight_d`,
	`b`.`selisih` AS `selisih`,
	`b`.`bobot` AS `bobot`
FROM
	(
		`04-2-view-weighted-promatch` `a`
		JOIN `bobot_pm` `b` ON (
			(
				`a`.`weight_d` = `b`.`selisih`
			)
		)
	)


------
select `a`.`id_nilai` AS `id_nilai`,`a`.`id_pimpinan` AS `id_pimpinan`,`a`.`C5` AS `C5`,`a`.`d` AS `d`,`a`.`d_jdosen` AS `d_jdosen`,`a`.`weight_d` AS `weight_e`,`b`.`selisih` AS `selisih`,`b`.`bobot` AS `bobot` from (`04-2-view-weighted-promatch` `a` join `bobot_pm` `b` on((`a`.`weight_e` = `b`.`selisih`)))

--------
SELECT
	`a`.`id_pimpinan` AS `id_pimpinan`,
	`a`.`kode` AS `kode`,
	`a`.`nama_pimpinan` AS `nama_pimpinan`,
	`a`.`jabatan` AS `jabatan`,
	`b`.`weight_e` AS `weight_e`,
	`b`.`bobot_e` AS `bobot_e`,
	`c`.`weight_f` AS `weight_f`,
	`c`.`bobot_f` AS `bobot_f`,
	`d`.`weight_g` AS `weight_g`,
	`d`.`bobot_g` AS `bobot_g`,
	`e`.`weight_a` AS `weight_a`,
	`e`.`bobot_a` AS `bobot_a`,
	`f`.`weight_b` AS `weight_b`,
	`f`.`bobot_b` AS `bobot_b`,
	`g`.`weight_c` AS `weight_c`,
	`g`.`bobot_c` AS `bobot_c`,
	`h`.`weight_d` AS `weight_d`,
	`h`.`bobot_d` AS `bobot_d`,
FROM
	`pimpinan` as `a`,
	`04-4-view-weighted-e` as `b`,
	`04-4-view-weighted-f` as `c`,
	`04-4-view-weighted-g` as `d`,
	`04-4-view-weighted-a` as `e`,
	`04-4-view-weighted-b` as `f`,
	`04-4-view-weighted-c` as `g`,
	`04-4-view-weighted-d` as `h`,
	
WHERE
	((`a`.`id_pimpinan` = `b`.`id_pimpinan`) AND 
	(`a`.`id_pimpinan` = `c`.`id_pimpinan`) AND 
	(`a`.`id_pimpinan` = `d`.`id_pimpinan`) AND
	(`a`.`id_pimpinan` = `e`.`id_pimpinan`) AND
	(`a`.`id_pimpinan` = `f`.`id_pimpinan`) AND
	(`a`.`id_pimpinan` = `g`.`id_pimpinan`) AND
	(`a`.`id_pimpinan` = `h`.`id_pimpinan`))

