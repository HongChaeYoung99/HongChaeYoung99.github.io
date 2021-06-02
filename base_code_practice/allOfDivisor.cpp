#include <iostream>
using namespace std;

int cnt[50001];
int main(void)
{
//	freopen("input.txt", "rt", stdin);
	int n;
	scanf("%d", &n);
	for (int i = 1; i<=n;i++)
	{
		cnt[i] = 0;
	}
	for (int i = 1; i <= n; i++)
	{
		for (int j = i; j <= n; j=j+i)
			cnt[j]++;
	}
	for(int i = 1; i<=n ; i++)
		printf("%d ", cnt[i]);
		
	return 0;
		
}
