#include <iostream>
using namespace std;

int main(void)
{
//	freopen("input.txt", "rt", stdin);
	int age, year;
	char a[20];
	scanf("%s", &a);
	if (a[7] == '1' || a[7] == '2')
		year = 1900 + (a[0]-'0')*10 + (a[1]-'0');
	else
		year = 2000 + (a[0]-'0')*10 + (a[1]-'0');
	age = 2021 - year + 1;
	printf("%d ", age);
	if (a[7] == '1' || a[7] == '3')
		printf("%c", 'M');
	else
		printf("%c", 'W');
		
	return 0;
}
