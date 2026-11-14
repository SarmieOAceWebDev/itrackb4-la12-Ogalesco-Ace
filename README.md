Laboratory Activity 3

Q1: Explain the order you placed your featured route and your detail route in, and what would happen if you swapped them.

well, i place the /subjects/featured route before the `/subjects/{id}. kasi chinicheck ni laravel and routes from the top to buttom. if i swapped them, the laravel might treat the word featured as a ID, so the featured page might not work correctly



Q2: What happens when someone visits an id that does not exist in your data, and what did you write to make that happen?

when there are someone visist an ID that does not exist in the subject data, such as /subjects/999, lalabas ang 404 Not found page. I use isset($subjects[$id]) to check of may existing ID na ganon, then i use abort(404) if the subject was not found



Q3: Why do your links use route names instead of typed URLs? Give one concrete thing that would break if they did not.

I use the route names for automatic na mag generate ang laravel ng tamang URL. Example, when the URL of the subject list is still working and the back link of it because of the route('subjects.index'). now when it is hardcoded URL, it is possble na masira ang link that may lead to 404 when the route change URL.


end.




Laboratory Act 6 Explain your reasoning

Q1. Why did you not need a new route for the second filter?

ans: i did not need to add another route because both filters are still using the same /subjects page. The router mainly checks the path of the URL, while the values after the ? are query strings. The code and the units filters only change the data shown on the same route, so adding another route was unnecessary.


Q2.If the filters used route parameters instead, what would the URL for “year 4 only, no course filter” look like, and why?

ans:if i used route parameters for the filters, I would need a URL structure that includes the values as part of the path. For example for year 4 only with no course filter, it could be something like /students/4. The problem is that the route parameters are mainly used to identify a specific resource, while filters are better handled using the query strings.


Q3.Why does the navigation stay active on the detail page and when a filter is applied, and which case required changing the pattern?

ans:the navigation pattern needed to change for the detail page because the detail URL is longer, such as /subjects/1, compared to the main /subjects path. Using a wildcard pattern allows the navigation to stay active on the detail page. The filter did not need a different path because the query string is still attached to the same /subjects route.


Q4.Why did you remove the old filter() method but keep the empty store() and update() methods?

ans:i deleted the old filter method because it was already replaced by the new query string filtering implementation. Keeping it would leave two different ways of handling filters even though the old method is no longer being used. I kept the empty store and update methods because they are the part of the resource controller and will be used for future functionality.



enddd.



Laboratory Act 7 
Q1. Your form sends data with POST rather than GET. Explain what would go wrong if it used GET instead. Your answer should say something about what a browser does when a page is refreshed.

ANS: if the form used GET, the browser would put the submitted values in the URL as query parameters, for example ?code That exposes the data in browser history and can make the URL unwieldy. More importantly, refreshing the page would repeat the GET request. Since creating a subject changes data, that could create duplicates if the app allowed creation through GET. In this Laravel app, the form submits to a POST route, so changing it to GET would instead fail because no GET route handles subjects.store.





Q2. When validation fails, your controller does not run the code that saves the record — and you did not write an if statement to stop it. Explain what actually stops it, and where the visitor ends up.

ANS:The laravels $request and validatate is the one who handles this automatically. if validation fails, it throws a validation excemption so the controller stops before reaching the code that saves the subject . the laravel redirects the visitor back to the form and makes the validation errors available there.


Q3.Your success message is displayed from the layout, which renders on every page. Explain why it does not appear on every page

ANS:the layout renders on every page, but the success messege is inside an if somthing but in session(success) check, the laravel stores it as a flash data, which is unavailable for oly the next request after the subject is created . and once that oage displays it, the flash data is cleared, so that is does not appear on later pages .





LA 9
(answers nalang)
q1 - Ginawa kong nullable ang code column para puwedeng ma save ang subject record kahit walang subject code na nailagay.then  Pinili ko ito dahil posibleng hindi pa available ang subject code kapag nag-a-add ng bagong subject.

q2 - ang unang naging error ko ay noong binuksan ko ang subject detail page then meron pa sa last yung 9999 which is the ss 8. Ang error ay “no such column: subjects.id” dahil walang id column ang subjects table. Inayos ko ito sa pamamagitan ng pagdaragdag ng id column at paglalagay ng IDs sa existing records, yung sa last naman yung sa SS 8 sadya talaga kasi hangang 10 lang kaya ng mga subjects ko 

q3 - gumagana pa rin yung mga pages kahit walang binagong Blade file dahil ang controller pa rin ang nagre return ng parehong Blade views at nagpapasa ng subject data na galing sa database. Ang model ang kumukuha ng records, habang ang Blade files ang nagpapakita ng data na ipinasa ng controller, pinish po thank you .



LA10
(answers nalang)

Q1 -i turned the category column into a separate categories table because the several subjects share the same category, such as Major, Project, and Elective. Instead of repeating these values in every subject record, I used the category_id to connect each subject to its category.

Q2 - the Screenshot 6 showed 11 queries because the application first retrieved all 10 subjects using one query, then retrieved the category of each subject separately. That resulted in 1 query for the subjects plus 10 queries for their categories

Q3 - The method is named category() because each of the subject belongs to only one category. If I named it categories(), Laravel might look for a different foreign key based on the plural name, which could cause the relationship to fail unless I manually configured it.



LA11 
(Answers)
Q1 - it needs two things, first is the route param name must match the controller argument name, and it must be type-hinted with the Model. If only the name matches, you just get a string ID, not the model. If only the type-hint matches, binding fails and it throws a 404.

Q2 - It was the <a> tag, so it sends a GET request. But the delete route expects DELETE. So it didn't hit the destroy method, it matched the show route GET /pets/{pet} instead, that's why it opened the detail page. It needs a form with @method('DELETE').

Q3 - it was the old('name', $subject->name) - If you leave out the second argument, the edit form will be empty on first load. If you use only the second argument, when validation fails the user's new input will be lost and it will revert to the database value.


LA12
(Answers)

Q1 - well the file at the top is Laravels core, not my code. The error just bubbled up there. My actual mistake is lower in the stack trace - in app/ folder, highlighted as my file, like the controller or blade file

Q2 - the error page only shows what broke at that second. The log will tell me next month how often it happened, what data the user sent, which user ID, and the pattern before it broke. Error page is gone after refresh, log stays.

Q3 - well the 403 is better for APIs, or when user really has no permission and shouldn't be able to retry like trying to access admin route. It's a hard stop. and the Redirect back with message is better for web UI like validation or trying to edit someone else's pet. User can fix it or understand why, better UX.


LA13
(ANSWERS)

Q1 - the resource controllers index handles the listing of records and usually prepares the data for display. My HomeController only handles the home page.

Q2 - the pagination links did not contain the search term. Because of this, the controller received no search value when moving to the next page. I fixed it using withQueryString().

Q3 - the misspelled sort value silently falls back to the default instead of showing an error. My allowed list makes sure only code and units can be used for sorting.