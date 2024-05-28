def square(number):
    if 1 <= number <= 64 :
        return 1 * 2 ** (number - 1)
    raise ValueError("square must be between 1 and 64")

def total():
    sm = 0
    for num in range(64):
        sm += square(num + 1)
    return sm
