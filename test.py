# //     { 'start': 10, 'end': 16 },
# //     { 'start': 17, 'end': 18 },
# //     { 'start': 1, 'end': 2 },
# //     { 'start': 8, 'end': 10 },
# //     { 'start': 17, 'end': 20 },
# //     { 'start': 19, 'end': 25 }

ranges = [(10,16),(17,18),(1,2),(8,10),(17,20),(19,25)]

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
    
print remove_overlap(ranges)