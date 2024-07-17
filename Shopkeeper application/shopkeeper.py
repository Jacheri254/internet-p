import sqlite3

# Connect to database 
conn = sqlite3.connect('shopkeeper.db')
c = conn.cursor()

# Create table
c.execute('''CREATE TABLE IF NOT EXISTS products
             (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, quantity INTEGER, price REAL)''')

def add_product():
    name = input("Enter product name: ")
    quantity = int(input("Enter product quantity: "))
    price = float(input("Enter product price: "))
    c.execute("INSERT INTO products (name, quantity, price) VALUES (?, ?, ?)", (name, quantity, price))
    conn.commit()
    print("Product added successfully!")

def view_products():
    c.execute("SELECT * FROM products")
    products = c.fetchall()
    for product in products:
        print(product)

def edit_product():
    id = int(input("Enter product id to edit: "))
    name = input("Enter new product name: ")
    quantity = int(input("Enter new product quantity: "))
    price = float(input("Enter new product price: "))
    c.execute("UPDATE products SET name = ?, quantity = ?, price = ? WHERE id = ?", (name, quantity, price, id))
    conn.commit()
    print("Product updated successfully!")

def delete_product():
    id = int(input("Enter product id to delete: "))
    c.execute("DELETE FROM products WHERE id = ?", (id,))
    conn.commit()
    print("Product deleted successfully!")

def main():
    while True:
        print("1. Add Product")
        print("2. View Products")
        print("3. Edit Product")
        print("4. Delete Product")
        print("5. Exit")
        choice = int(input("Enter your choice: "))
        
        if choice == 1:
            add_product()
        elif choice == 2:
            view_products()
        elif choice == 3:
            edit_product()
        elif choice == 4:
            delete_product()
        elif choice == 5:
            break
        else:
            print("Invalid choice! Please try again.")

if __name__ == "__main__":
    main()
    conn.close()
