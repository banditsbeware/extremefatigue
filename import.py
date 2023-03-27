import os
import re
import sqlite3
import numpy as np

sql = sqlite3.connect('database.db')
c = sql.cursor()

file_name = "23_02"
date_stem = "2023-02-"

tag_re = re.compile('<.+?>')
end_li_re = re.compile('</li>$')

with open(f"dict/{file_name}", 'r') as f: _file = f.readlines()

n = 1
for line in _file:
    [term, defn] = line.strip().split('</b>')
    term = tag_re.sub('', term)
    defn = end_li_re.sub('', defn)
    date = date_stem + str( 27 * n // len(_file)  + 1 )
    n += 1

    print(term + ": " + defn[:16] + "... " + date)

    c.execute(f"INSERT INTO dict (term, defn, date) VALUES (?, ?, '{date}');", (term, defn,))

sql.commit()

c.execute("SELECT * FROM dict")
for row in c.fetchall():
    print(row)