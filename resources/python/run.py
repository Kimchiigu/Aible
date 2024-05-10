import subprocess

def run_script_in_new_terminal(script_path):
    # The command to start a new cmd window and run the python script
    cmd_command = f'start cmd /k python {script_path}'

    # Use subprocess to run the command
    subprocess.run(cmd_command, shell=True)

# Replace 'path_to_script.py' with the path to the script you want to run
run_script_in_new_terminal('"D:/Binus/Ureeka/aible/resources/python/camera.py"')
