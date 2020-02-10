## Calendar Conflicts

One of the core pieces of functionality in our system is our calendaring module. When a user loads a calendar, the calendar displays all the visits that are scheduled for the selected client within the given time period. (A “visit” is a scheduled time for a caregiver to give care to a client, similar to an in-home doctor’s visit.) In addition to the visits, the calendar also displays any “conflicts” with the given visits. There are many types of potential conflicts:

- A client has overlapping visits scheduled
- A caregiver has overlapping visits scheduled
- A caregiver is scheduled for more than 40 hours of care (meaning the agency would have to pay overtime)
- A caregiver is assigned to give care to a client with whom the caregiver is incompatible (for instance, the client has a dog and the caregiver is allergic to dogs)
- … and other types of conflicts

Currently, the server has to determine these (and any other) conflicts every time a calendar is loaded:

1. user loads a calendar, which triggers an API call to load visits
2. server gathers visits
3. server calculates conflicts on each visit
4. server sends API response
5. and finally, the visits appear on the user's calendar

For large systems, step 3 quickly becomes a slow operation. Your assignment is to propose a design that alleviates the slowness on large systems. We are not looking for code; we are looking for a high-level discussion about a method of solving this problem that would result in a better experience for our users. Feel free to propose multiple potential solutions, and describe the various trade-offs of each approach.

After you come up with your design, we will ask you to explain your solution, then we will discuss the solution further. Your solution will be judged using the following criteria:

- user experience (don't burden the user with extra unnecessary steps)
- potential execution time speedup
- memory usage
- ease of implementation
- maintainability (will this solution still work as the system grows and we add additional types of conflicts?)
- infrastructure (what additional infrastructure requirements does this solution introduce?)
- discussion of trade-offs for proposed approach(es)

Good luck!

