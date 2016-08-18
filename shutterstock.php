/**
  * Code Review Exercise
  * Perform a code review of the following code and refactor it in order to improve its:
  * 	a. Readability
  * 	b. Maintainability
  * 	c. Simplicity
  *	NOTE: This code is functionally correct and executes according to specification.
  */
int f(boolean ALPHA, boolean BRAVO, boolean CHARLIE, boolean DELTA, boolean ECHO) {
	if (ALPHA)  {
		foxtrot();
		if (BRAVO)  {
			golf();
			if (CHARLIE)  {
				hotel();
				india();
				if (DELTA)  {
					juliet();
					if (ECHO)  {
						kilo();
						return ROMEO;
					}
					else {
						lima();
						return SIERRA;
					}
				}
				else {
					mike();
					november();
					return TANGO;
				}
			}
			else {
				oscar();
				return UNIFORM;
			}
		}
		else {
			papa();
			return VICTOR;
		}
	}
	else {
		quebec();
		return WHISKEY;
	}
}

//After Code Review
if (ALPHA && BRAVO && CHARLIE && DELTA && ECHO)  {
    foxtrot(); //ALPHA
    golf(); //BRAVO
    hotel(); //CHARLIE
    india(); //CHARLIE
    juliet(); //DELTA
    kilo(); //ECHO
	return ROMEO; //ECHO
elseif(!BRAVO)  {
    papa();
    return VICTOR;  
}elseif(!CHARLIE)  {
    oscar();
	return UNIFORM; 
}elseif(!DELTA)  {
    mike();
	november();
	return TANGO;
}elseif(!ECHO)  {
    lima();
	return SIERRA;
}