# Reloading broken supervisor tasks  
The script was created to solve the problem of lack of pauses between reboot attempts in the supervisor.
The supervisor can use up all attempts in a few minutes and your task will completely fail. The script will help you find such tasks and restart them, for example, every hour.
The script restarts tasks that are in the FATAL state (the number of start attempts exceeded)

## Usage
>./spv_restart.php all  

or  

>spv_restart.php my-task1,my-task2

where as a parameter to pass task names separated by commas, `all` or just empty
