import os
import tkinter as tk
from tkinter import filedialog

def rename_files(folder_path):
    if not folder_path:
        return

    file_list = os.listdir(folder_path)
    file_list.sort()

    # Rename files
    for i, filename in enumerate(file_list):
        _, ext = os.path.splitext(filename)
        new_filename = f"{i+1}{ext}"
        os.rename(os.path.join(folder_path, filename), os.path.join(folder_path, new_filename))

    # Show success message
    tk.messagebox.showinfo("Success", "Files renamed successfully!")

def open_folder():
    folder_path = filedialog.askdirectory()
    if folder_path:
        rename_files(folder_path)

# Create UI
root = tk.Tk()
root.title("File Renamer")

# Add button to open folder
open_button = tk.Button(root, text="Open Folder", command=open_folder)
open_button.pack(pady=20)

root.mainloop()
