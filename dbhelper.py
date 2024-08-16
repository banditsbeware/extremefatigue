#!/opt/homebrew/bin/python3

# dbhelper.py
# command line interface for editing the database

import os
import sqlite3
import datetime as dt

# a print function, for uniformity
def print_row(said, title, date):
    print('{0:<5}|{1:<30}|{2:<20}'.format(said, title, date))

def today():
    d = dt.date.today()
    return f"{d.year}-{d.month:02}-{d.day:02}"

def main():
    # connect to the database file
    sql = sqlite3.connect('database.db')
    c = sql.cursor()

    # print existing contents of database
    c.execute( "SELECT * FROM essay;" )
    print()
    print_row('id', 'title', 'date')
    print_row('-'*5, '-'*30, '-'*20)
    for row in c.fetchall():
        print_row(row[0], row[1], row[2])

    choice = input("\nOptions:\n  (A)dd an essay\n  (E)dit an essay\n  (D)elete an essay\n  > ").lower()

    if choice == 'a':
        # get a filename from user for reading
        fn = input("\nfile to add: ").strip()

        if not os.path.exists(fn):
            raise Exception(f"file not found: {fn}")

        date = today()
        title = input("title: ").strip()

        print(f'file: {fn}')
        print(f'date: {date}')
        print(f'title: {title}')

        with open(fn, 'r') as f:
            txt = f.read()

        if len(txt) > 100:
            print(f'content:\n' + txt[0:100] + '\n.\n.\n.\n' + txt[-100:]) 
        else:
            print(f'content:\n' + txt)

        # add essay to database
        if input("add to database? ") == "y":
            c.execute(f"INSERT INTO essay (title, date, content) VALUES (?, ?, ?);", (title, date, txt,))
            sql.commit()
        else: 
            raise Exception('alright. cya!')

        # move essay file to archive
        os.rename(fn, f'../html.bkp/{fn}')

        # print new contents of database
        c.execute( "SELECT * FROM essay;" )
        print()
        print_row('id', 'title', 'date')
        print_row('-'*5, '-'*30, '-'*20)
        for row in c.fetchall():
            print_row(row[0], row[1], row[2])

    elif choice == 'e':
        idiot = True
        while idiot:
            try:
                said = int( input("\nEnter essay id: ") )
                idiot = False
            except ValueError:
                print(f"{said} is not an integer")
                continue

            c.execute(f"SELECT * FROM essay WHERE id={said};")
            rows = c.fetchall()
            if len(rows) != 1:
                print(f"no results for id {said}")
                idiot = True

        said, title, date, content = rows[0][0:]

        # create a file for editing the contents
        fn = f"edit_{title}.html"

        with open(fn, 'w') as f: f.writelines(rows[0][3])

        # edit in vim
        import subprocess as sp
        sp.call(['vim', fn])

        # read new content and delete temp file
        with open(fn, 'r') as f: new_content = f.read()
        os.remove(fn)

        # ask for updates to title, date
        print("contents updated.")
        new_title = input(f"\nnew title ({title}): ")
        if not new_title: new_title = title
        new_date = input(f"new date ({date}): ")
        if not new_date: new_date = date

        c.execute(f"""
            UPDATE essay
            SET title=?, date=?, content=?
            WHERE id=? ;""", (new_title, new_date, new_content, said));

        sql.commit()

        c.execute(f"SELECT * FROM essay WHERE id={said};")
        row = c.fetchall()[0]

        print("database updated:")
        print_row(row[0], row[1], row[2])

    elif choice == 'd':
        idiot = True
        while idiot:
            try:
                said = int( input("\nEnter essay id: ") )
                idiot = False
            except ValueError:
                print(f"{said} is not an integer")
                continue

            c.execute( f"SELECT * FROM essay WHERE id={said};" )
            rows = c.fetchall()
            if len(rows) != 1:
                print(f"no results for id {said}")
                idiot = True

        said, title, date, content = rows[0][0:]

        x = input( f"are you sure you want to delete essay {said}: \"{title}\"? (y/N) " )

        if x.lower() == "y": c.execute( f"DELETE FROM essay WHERE id={said};" )

        sql.commit()
        
        # print new contents of database
        c.execute( "SELECT * FROM essay;" )
        print()
        print_row('id', 'title', 'date')
        print_row('-'*5, '-'*30, '-'*20)
        for row in c.fetchall():
            print_row(row[0], row[1], row[2])

        print( "\ndeleted essay {said}: \"{title}\"" )

    
if __name__ == '__main__':
    main()
