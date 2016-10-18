# //     { 'start': 10, 'end': 16 },
# //     { 'start': 17, 'end': 18 },
# //     { 'start': 1, 'end': 2 },
# //     { 'start': 8, 'end': 10 },
# //     { 'start': 17, 'end': 20 },
# //     { 'start': 19, 'end': 25 }
#// Merge and Sort overlapping segments
#//
#// A segment has a 'start' and an 'end' where 'start' >= 0 and 'end' > 'start'.
#// A segment overlaps another segment even if their boundaries are the same.
#// Given a list of unordered segments, write a function that merges all the overlapping segments and sorts them by 'start'.

ranges = [(10,16),(17,18),(1,2),(8,10),(17,20),(19,25)]
ranges = [(0,1),(3,5),(4,8),(10,12),(9,10)]

def remove_overlap(ranges):
    result = []
    current_start = -1
    current_stop = -1 
    
    for start, stop in sorted(ranges):
        if start > current_stop:
            # this segment starts after the last segment stops
            # just add a new segment
            result.append( (start, stop) )
            current_start, current_stop = start, stop
        else:
            # segments overlap, replace
            result[-1] = (current_start, stop)
            # current_start already guaranteed to be lower
            current_stop = max(current_stop, stop)
            
    return result
    
print(remove_overlap(ranges))