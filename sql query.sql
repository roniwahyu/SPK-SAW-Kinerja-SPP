sum(case when a.id_kriteria=1 then a.nilai end) as C1,
sum(case when a.id_kriteria=2 then a.nilai end) as C2,
sum(case when a.id_kriteria=3 then a.nilai end) as C3,
sum(case when a.id_kriteria=4 then a.nilai end) as C4,
sum(case when a.id_kriteria=5 then a.nilai end) as C5,
sum(case when a.id_kriteria=6 then a.nilai end) as C6,
sum(case when a.id_kriteria=7 then a.nilai end) as C7,

if(a.C1 BETWEEN 55 AND 65,0,if(a.C1 BETWEEN 65 AND 70,0.25,if(a.C1 BETWEEN 70 AND 75,0.5,if(a.C1 BETWEEN 75 AND 80,0.75,if(a.C1 BETWEEN 80 AND 100,1,0))))) as C1,
if(a.C2 BETWEEN 55 AND 65,0,if(a.C2 BETWEEN 65 AND 70,0.25,if(a.C2 BETWEEN 70 AND 75,0.5,if(a.C2 BETWEEN 75 AND 80,0.75,if(a.C2 BETWEEN 80 AND 100,1,0))))) as C2,
if(a.C3 BETWEEN 55 AND 65,0,if(a.C3 BETWEEN 65 AND 70,0.25,if(a.C3 BETWEEN 70 AND 75,0.5,if(a.C3 BETWEEN 75 AND 80,0.75,if(a.C3 BETWEEN 80 AND 100,1,0))))) as C3,
if(a.C4 BETWEEN 55 AND 65,0,if(a.C4 BETWEEN 65 AND 70,0.25,if(a.C4 BETWEEN 70 AND 75,0.5,if(a.C4 BETWEEN 75 AND 80,0.75,if(a.C4 BETWEEN 80 AND 100,1,0))))) as C4,
if(a.C5 BETWEEN 55 AND 65,0,if(a.C5 BETWEEN 65 AND 70,0.25,if(a.C5 BETWEEN 70 AND 75,0.5,if(a.C5 BETWEEN 75 AND 80,0.75,if(a.C5 BETWEEN 80 AND 100,1,0))))) as C5,
if(a.C6 BETWEEN 55 AND 65,0,if(a.C6 BETWEEN 65 AND 70,0.25,if(a.C6 BETWEEN 70 AND 75,0.5,if(a.C6 BETWEEN 75 AND 80,0.75,if(a.C6 BETWEEN 80 AND 100,1,0))))) as C6,
if(a.C7 BETWEEN 55 AND 65,0,if(a.C7 BETWEEN 65 AND 70,0.25,if(a.C7 BETWEEN 70 AND 75,0.5,if(a.C7 BETWEEN 75 AND 80,0.75,if(a.C7 BETWEEN 80 AND 100,1,0))))) as C7,

if(a.C1 BETWEEN 0 and 20,1,if(a.C1 BETWEEN 21 and 59,2,if(a.C1 BETWEEN 60 and 70,3,if(a.C1 BETWEEN 71 and 80,4,5)))) a,
if(a.C2 BETWEEN 0 and 20,1,if(a.C2 BETWEEN 21 and 59,2,if(a.C2 BETWEEN 60 and 70,3,if(a.C2 BETWEEN 71 and 80,4,5)))) b,
if(a.C3 BETWEEN 0 and 20,1,if(a.C3 BETWEEN 21 and 59,2,if(a.C3 BETWEEN 60 and 70,3,if(a.C3 BETWEEN 71 and 80,4,5)))) c,

max(a.C1) as mc1,
max(a.C2) as mc2,
max(a.C3) as mc3,
max(a.C4) as mc4,
max(a.C5) as mc5,
max(a.C6) as mc6,
max(a.C7) as mc7


a.C1/b.mc1 as wc1,
a.C2/b.mc2 as wc2,
a.C3/b.mc3 as wc3,
a.C4/b.mc4 as wc4,
a.C5/b.mc5 as wc5,
a.C6/b.mc6 as wc6,
a.C7/b.mc7 as wc7

a.wc1*b.mc1 as sum1,
a.wc2*b.mc2 as sum2,
a.wc3*b.mc3 as sum3,
a.wc4*b.mc4 as sum4,
a.wc5*b.mc5 as sum5,
a.wc6*b.mc6 as sum6,
a.wc7*b.mc7 as sum7