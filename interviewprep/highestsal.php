<?php

// Here's an example query to find the nth highest salary:

// SELECT DISTINCT salary
// FROM employees
// ORDER BY salary DESC
// LIMIT n-1, 1;








// if you want to find the 3rd highest salary, replace n with 3:

//     SELECT DISTINCT salary
// FROM employees
// ORDER BY salary DESC
// LIMIT 2, 1;




// if you want to find the 2nd highest salary, replace n with 3:

//     SELECT DISTINCT salary
// FROM employees
// ORDER BY salary DESC
// LIMIT 2, 1;


// SELECT MAX(salary) AS second_highest_salary
// FROM employees
// WHERE salary < (SELECT MAX(salary) FROM employees);

