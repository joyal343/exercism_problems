A generator function looks like any other function, but contains one or more [yield expressions][yield expression].

Each `yield` will suspend code execution, saving the current execution state (_including all local variables and try-statements_).

When the generator resumes, it picks up state from the suspension - unlike regular functions which reset with every call.

The rationale behind this is that you use a generator when you do not need to produce all the values _at once_.