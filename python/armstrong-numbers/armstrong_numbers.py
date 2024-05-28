def is_armstrong_number(number):
    power, temp = 0, number
    digits = []
    if number == 0:
        return True
    while temp != 0:
        power += 1
        digits.append(temp % 10)
        temp = int(temp / 10)
    sm = 0
    for num in digits:
        sm += num**power 
    if sm == number:
        return True 
    return False
