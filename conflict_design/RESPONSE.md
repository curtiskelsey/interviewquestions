# Calendar Conflict Proposed Solution 

## Assumptions
- Data is persisted in a relational database
- Data flow `DB -> PHP (API) -> Client Render`

## Proposed solution
Add a field to the visit records indicating the last time the visit has been validated. In addition, add a field to the 
visit records to record all conflicts reported for the visit. These two fields provide a data driven process for 
displaying the calendar and all conflicts eliminating the need to calculate conflicts at the time of calendar retrieval.
The current API should be modified to only run the conflict calculation when a visit has not been validated. Dropping 
these changes in should allow the system to function in it's current form while preparing it for improved performance. 

If the system does not have an event manager in place, add one. Provide the event manager to all system actions in which 
data is added/modified/removed and the data impacts the calculation of conflicts. Have these events trigger an event 
that will recalculate conflicts. 

Now that the system is setup to trigger an event each time something happens that could impact the calculated conflicts,
create an event listener to tie to the event. Do not handle conflict recalculation within the listener as it could be 
tied to a user's web request and the work could elongate the response time for the user. Instead, at this juncture a
work/task queue should be added to the system to run tasks in the background, detatched from user requests. The listener
should enqueue a task that will handle recalculation of the conflicts and store them on the visit record. The data that
triggered the event should be provided to the task. 

The benefits of the proposed solution include:
* The retrieval of a calendar has been converted to strictly data driven
* The performance of calendar retrieval is improved and consistent
* Implementation is incremental and will enrich the system architecture 

The costs of the proposed solution include:
* Additional infrastructure/architectural needs (Event Manager, Task Queue)
* Implementation will take time
* Conflict display time may be delayed depending on task queue performance

## Incremental Improvements

### 1st Recommendation
If paging does not already exist, adding paging will reduce the window of data and provide a constant performance at
scale. The proposed paging would allow selection of data given a date and the number of days to retrieve. The number of 
days would need to have a hard upper limit to enforce a constant of performance at scale. Changes would include:
- Provide database queries that respect the paging parameters
- Add support for the paging parameters to the API
- Add paging support to the frontend code

**The intent of this recommendation is not to improve performance but to provide consistency to the feature at scale.**

### 2nd Recommendation
Introduce validation when adding/modifying visits. If the conflict checks are made at the time of visit addition, the 
checks will only be ran for a single visit. Providing warnings or rejecting the addition of a visit at the time it is 
being added or modified will help control the quality of the content in the calendar, reducing the number of conflicts 
that must be displayed. 

### 3rd Recommendation (Post proposal)
Add a notification system to the application. Post validation, send a notification with the updated conflict list for
the visit. Update the frontend code to subscribe to the notification system and listen for these notifications. When
received, the frontend dataset should be updated with the new list of conflicts. This enhancement will improve the 
latency of displaying conflicts on the calendar for the user and will eliminate the need to refresh the page. Extend
this to have the entire visit sent via the notification to keep the calendar in sync with visits as well and it will
reduce the number of full page loads users must do to receive the information they are wanting to see on the page.

**The intent of this recommendation is not to improve performance but to provide a constantly updated view to the user
without the need for page reloads.**
   
