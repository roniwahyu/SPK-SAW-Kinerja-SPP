sum(if(a.kriteria_id=8,a.bobot,0)) as wa,
sum(if(a.kriteria_id=9,a.bobot,0)) as wb,
sum(if(a.kriteria_id=10,a.bobot,0)) as wc
sum(if(a.kriteria_id=11,a.bobot,0)) as wd,
sum(if(a.kriteria_id=12,a.bobot,0)) as we,
sum(if(a.kriteria_id=13,a.bobot,0)) as wf,
sum(if(a.kriteria_id=14,a.bobot,0)) as wg,


sum(if(a.kriteria_id=1,a.penilaian,0)) as c1,
sum(if(a.kriteria_id=2,a.penilaian,0)) as c2,
sum(if(a.kriteria_id=3,a.penilaian,0)) as c3,
sum(if(a.kriteria_id=4,a.penilaian,0)) as c4,
sum(if(a.kriteria_id=5,a.penilaian,0)) as c5,
sum(if(a.kriteria_id=6,a.penilaian,0)) as c6,
sum(if(a.kriteria_id=7,a.penilaian,0)) as c7,

max(a.c1) as maxc1,
max(a.c2) as maxc2,
max(a.c3) as maxc3,
max(a.c4) as maxc4,
max(a.c5) as maxc5,
max(a.c6) as maxc6,
max(a.c7) as maxc7,

a.c1/b.maxc1 as normc1,
a.c2/b.maxc2 as normc2,
a.c3/b.maxc3 as normc3,
a.c4/b.maxc4 as normc4,
a.c5/b.maxc5 as normc5,
a.c6/b.maxc6 as normc6,
a.c7/b.maxc7 as normc7,

(a.normc1*b.maxc1)+
(a.normc2*b.maxc2)+
(a.normc3*b.maxc3)+
(a.normc4*b.maxc4)+
(a.normc5*b.maxc5)+
(a.normc6*b.maxc6)+
(a.normc7*b.maxc7)