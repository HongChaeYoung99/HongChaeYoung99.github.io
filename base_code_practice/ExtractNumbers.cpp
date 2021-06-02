#include <iostream>
using namespace std;

int main(void)
{
//	freopen("input.txt", "rt", stdin);
	char a[100];
	scanf("%s",&a);
	int res= 0, cnt = 0;
	for (int i = 0; a[i] != '\0' ; i++)
	{
		if('0' <= a[i] && a[i] <= '9')
			res = res * 10 + (a[i]-'0');
	}
	printf("%d ", res);
	for (int i = 1 ; i <= res ; i++)
	{
		if(res % i == 0)
			cnt++;
	}
	printf("%d", cnt);
	
	return 0;
}
