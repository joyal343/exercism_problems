"""Functions to automate Conda airlines ticketing system."""


def generate_seat_letters(number):
    """Generate a series of letters for airline seats.

    :param number: int - total number of seat letters to be generated.
    :return: generator - generator that yields seat letters.

    Seat letters are generated from A to D.
    After D it should start again with A.

    Example: A, B, C, D

    """
    letters = ['A','B','C','D']
    counter = 0
    while counter < number :
        yield letters[counter % 4]
        counter +=1



def generate_seats(number):
    """Generate a series of identifiers for airline seats.

    :param number: int - total number of seats to be generated.
    :return: generator - generator that yields seat numbers.

    A seat number consists of the row number and the seat letter.

    There is no row 13.
    Each row has 4 seats.

    Seats should be sorted from low to high.

    Example: 3C, 3D, 4A, 4B

    """
    seat_letter = generate_seat_letters(number)
    counter = 0
    seat_no = 0
    while counter < number :
        if counter % 4 == 0 :
            seat_no += 1
        counter += 1
        if seat_no == 13 :
            seat_no += 1
        yield str(seat_no)+next(seat_letter)

def assign_seats(passengers):
    """Assign seats to passengers.

    :param passengers: list[str] - a list of strings containing names of passengers.
    :return: dict - with the names of the passengers as keys and seat numbers as values.

    Example output: {"Adele": "1A", "Björk": "1B"}

    """
    new_dict = {}
    seat_no = generate_seats(len(passengers))
    for item in passengers:
        new_dict[item] = next(seat_no)
    return new_dict

def generate_codes(seat_numbers, flight_id):
    """Generate codes for a ticket.

    :param seat_numbers: list[str] - list of seat numbers.
    :param flight_id: str - string containing the flight identifier.
    :return: generator - generator that yields 12 character long ticket codes.

    """
    for item in seat_numbers:
       code = item + flight_id
       code = code + "0"*(12 - len(code)) 
       yield code
