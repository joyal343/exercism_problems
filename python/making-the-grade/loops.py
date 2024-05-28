"""Functions for organizing and calculating student exam scores."""


def round_scores(student_scores):
    """Round all provided student scores.

    :param student_scores: list - float or int of student exam scores.
    :return: list - student scores *rounded* to nearest integer value.
    """
    new_student_scores =[]
    for item in student_scores:
        new_student_scores.append(round(item)) 
    return new_student_scores

def count_failed_students(student_scores):
    """Count the number of failing students out of the group provided.

    :param student_scores: list - containing int student scores.
    :return: int - count of student scores at or below 40.
    """
    fail_count = 0
    for item in student_scores:
        if item <= 40:
            fail_count += 1
    return fail_count

def above_threshold(student_scores, threshold):
    """Determine how many of the provided student scores were 'the best' based on the provided threshold.

    :param student_scores: list - of integer scores.
    :param threshold: int - threshold to cross to be the "best" score.
    :return: list - of integer scores that are at or above the "best" threshold.
    """
    best_std = []
    for item in student_scores:
        if item >= threshold:
            best_std.append(item)
    return best_std


def letter_grades(highest):
    """Create a list of grade thresholds based on the provided highest grade.

    :param highest: int - value of highest exam score.
    :return: list - of lower threshold scores for each D-A letter grade interval.
            For example, where the highest score is 100, and failing is <= 40,
            The result would be [41, 56, 71, 86]:

            41 <= "D" <= 55
            56 <= "C" <= 70
            71 <= "B" <= 85
            86 <= "A" <= 100
    """
    range_avb = highest - 40
    interval = range_avb / 4  
    grade_list = []
    i = 0
    while i < 4:
        highest = highest - interval
        grade_list.append(int(highest)+1)
        i += 1
    grade_list.reverse()
    return grade_list


def student_ranking(student_scores, student_names):
    """Organize the student's rank, name, and grade information in descending order.

    :param student_scores: list - of scores in descending order.
    :param student_names: list - of string names by exam score in descending order.
    :return: list - of strings in format ["<rank>. <student name>: <score>"].
    """
    rank = 1
    nw_lst = []
    for index , item in enumerate(student_scores):
        nw_lst.append(str(rank)+'. '+student_names[index]+': '+str(item))
        rank += 1
    return nw_lst


def perfect_score(student_info):
    """Create a list that contains the name and grade of the first student to make a perfect score on the exam.

    :param student_info: list - of [<student name>, <score>] lists.
    :return: list - first `[<student name>, 100]` or `[]` if no student score of 100 is found.
    """

    for item in student_info:
        if item[1] == 100:
            return item 
    return []

# 85 - 40
# 45/4 = 11.25

# 85 - 11.25 = 73.75
# 73 + 1