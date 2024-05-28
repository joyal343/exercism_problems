"""Functions which helps the locomotive engineer to keep track of the train."""


def get_list_of_wagons(*args):
    """Return a list of wagons.

    :param: arbitrary number of wagons.
    :return: list - list of wagons.
    """
    new_list = list(args)
    return new_list

def fix_list_of_wagons(each_wagons_id, missing_wagons):
    """Fix the list of wagons.

    :param each_wagons_id: list - the list of wagons.
    :param missing_wagons: list - the list of missing wagons.
    :return: list - list of wagons.
    """
    first ,second ,one, *rest = each_wagons_id
    *new_list, = one ,*missing_wagons, *rest, first,second 
    return new_list


def add_missing_stops(route,**kwargs):
    """Add missing stops to route dict.

    :param route: dict - the dict of routing information.
    :param: arbitrary number of stops.
    :return: dict - updated route dictionary.
    """
    *route["stops"], = kwargs.values()
    return route

def extend_route_information(route, more_route_information):
    """Extend route information with more_route_information.

    :param route: dict - the route information.
    :param more_route_information: dict -  extra route information.
    :return: dict - extended route information.
    """
    *new_info, = *route.items() , *more_route_information.items()
    return dict(new_info)

# ({'from': 'Berlin', 'to': 'Hamburg'}, {'stop_1': 'Lepzig', 'stop_2': 'Hannover', 'stop_3': 'Frankfurt'})
def fix_wagon_depot(wagons_rows):
    """Fix the list of rows of wagons.

    :param wagons_rows: list[list[tuple]] - the list of rows of wagons.
    :return: list[list[tuple]] - list of rows of wagons.
    """
    new_list = [[],[],[]]
    for index,item in enumerate(wagons_rows):
        x, y, z = item
        new_list[0].append(x)
        new_list[1].append(y)
        new_list[2].append(z)
    return new_list



