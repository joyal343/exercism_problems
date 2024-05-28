def istriangle(x,y,z):
    if x <= 0 or y <= 0 or z <=0:
        return False
    if (x + y >= z and y + z >= x and x + z >= y):
        return True 
    return False
def equilateral(sides):
    x, y, z = sides
    if istriangle(x,y,z):
        if x == y and z == y:
            return True 
        return False
    return False

def isosceles(sides):

    x, y, z = sides
    if istriangle(x,y,z):
        if x == y :
            return True 
        if y == z :
            return True 
        if x == z :
            return True
        return False 
    return False 


def scalene(sides):
    x, y, z = sides
    if istriangle(x,y,z) :
        if x != y and y!=z and x!=z:
            return True 
        return False
    return False
