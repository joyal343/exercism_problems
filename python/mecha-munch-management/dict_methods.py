"""Functions to manage a users shopping cart items."""


def add_item(current_cart, items_to_add):
    """Add items to shopping cart.

    :param current_cart: dict - the current shopping cart.
    :param items_to_add: iterable - items to add to the cart.
    :return: dict - the updated user cart dictionary.
    """

    for item in items_to_add:
        if item not in current_cart:
            current_cart[item] = 1
        else:
            current_cart[item] += 1
    return current_cart

def read_notes(notes):
    """Create user cart from an iterable notes entry.

    :param notes: iterable of items to add to cart.
    :return: dict - a user shopping cart dictionary.
    """
    new_dict = {}
    for item in notes:
        new_dict[item] = 1
    return new_dict

def update_recipes(ideas, recipe_updates):
    """Update the recipe ideas dictionary.

    :param ideas: dict - The "recipe ideas" dict.
    :param recipe_updates: dict - dictionary with updates for the ideas section.
    :return: dict - updated "recipe ideas" dict.
    """
    recipe_updates_dict = dict(recipe_updates)
    ideas.update(recipe_updates)
    return ideas


def sort_entries(cart):
    """Sort a users shopping cart in alphabetically order.

    :param cart: dict - a users shopping cart dictionary.
    :return: dict - users shopping cart sorted in alphabetical order.
    """
    return dict(sorted(cart.items()))
    
    


def send_to_store(cart, aisle_mapping):
    """Combine users order to aisle and refrigeration information.

    :param cart: dict - users shopping cart dictionary.
    :param aisle_mapping: dict - aisle and refrigeration information dictionary.
    :return: dict - fulfillment dictionary ready to send to store.
    """
    print(cart)
    new_dict = {}
    for key , value in cart.items():
        new_dict[key] = [value, aisle_mapping[key][0],aisle_mapping[key][1]]
    new_dict = dict(sorted(new_dict.items(), reverse=True))
    return new_dict

def update_store_inventory(fulfillment_cart, store_inventory):
    """Update store inventory levels with user order.

    :param fulfillment cart: dict - fulfillment cart to send to store.
    :param store_inventory: dict - store available inventory
    :return: dict - store_inventory updated.
    """
    for key,value in fulfillment_cart.items():
        if store_inventory[key][0] - value[0] > 0:
            store_inventory[key][0] = store_inventory[key][0] - value[0]
        else :
            store_inventory[key][0] = 'Out of Stock'
    new_dict = dict(sorted(store_inventory.items(),reverse=True))
    return new_dict 

